<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Collection;

use App\User;
use App\Models\Espece;
use App\Models\Productions\Demande;
use App\Models\Productions\Prelevement;
use App\Models\Productions\Resultat;
use App\Models\Productions\Export;
use App\Models\Productions\Exportation;
use App\Models\Analyses\Anaitem;
use App\Models\Analyses\Analyse;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ResultatsExportation;
use App\Http\Traits\LitJson;
use App\Http\Traits\Personne;
use App\Http\Traits\UserTypeOutil;
use Carbon\Carbon;

class ExportsController extends Controller
{
  use LitJson, UserTypeOutil, Personne;

  protected $menu;
  protected $formats;
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function __construct()
  {
    $this->menu = $this->litJson("menuLabo");
    $this->formats = $this->litJson('formats_export');
  }


  public function choix()
  {

    $users = User::all();
    $demandes = Demande::all();
    $especes = Espece::orderBy('nom')->get();
    $anaitems = Anaitem::orderBy('nom')->get();
    $de = (new Carbon(Demande::min('date_prelevement')))->toDateString();
    $a = (new Carbon(max([
    Demande::max('date_prelevement'),
    Demande::max('date_reception'),
    Demande::max('date_resultat'),
    Demande::max('date_envoi'),
    Demande::max('date_signature'),
    ])))->toDateString();

    return view('exports.choix', [
    'menu' => $this->menu,
    'formats' => $this->formats,
    'especes' => $especes,
    'users' => $users,
    'eleveurs' => User::where('usertype_id', $this->userTypeEleveur()->id)->orderBy('name')->get(),
    'vetos' => User::where('usertype_id', $this->userTypeVeto()->id)->orderBy('name')->get(),
    'anaitems' => $anaitems,
    'de' => $de,
    'a' => $a,
    ]);

  }

  public function entetesDemande($demande)
  {

    $analyse = Analyse::where('espece_id', $demande->espece_id)
    ->where('anatype_id', $demande->anaacte->anatype_id)
    ->first();

    $anaitems = $analyse->anaitems;

    $entete[] = 'Identification';
    $entete[] = 'Nom';

    foreach ($anaitems as $anaitem) {

      $entete[] = ($anaitem->unite->nom === '') ? $anaitem->nom : $anaitem->nom.' ('. $anaitem->unite->nom .')';

    }

    $entete[] = "Troupeau";
    $entete[] = "Espece";
    $entete[] = "Date de prelevement";
    $entete[] = "Date d'analyse";
    $entete[] = "Mélange";
    $entete[] = "Semble parasité";

    return $entete;
  }

  /**
  * Exportation d'une demande d'analyse seule (disponible dans demandeShow)
  */
  public function demande($demande_id)
  {
    $demande = Demande::find($demande_id);

    $prelevements = Prelevement::where('demande_id', $demande_id)->get();

    $entetes = $this->entetesDemande($demande);

    $resultats = Collect();

    foreach ($prelevements as $prelevement) {

      $resultat = [];
      $resultat['identification'] = $prelevement->animal->numero ?? $prelevement->identification;
      $resultat['nom'] = $prelevement->animal->nom ?? '';

      foreach ($prelevement->analyse->anaitems as $anaitem) {

        $valeur = Resultat::where('prelevement_id', $prelevement->id)
        ->where('anaitem_id', $anaitem->id)->first();

        $resultat[$anaitem->nom] = $valeur->valeur;

      }
      $resultat['troupeau'] = $prelevement->demande->troupeau->nom ?? '';
      $resultat['espece'] = $prelevement->demande->espece->nom;

      $resultat['date_prelevement'] = (new Carbon($prelevement->demande->date_prelevement))->toDateString();
      $resultat['date_resultat'] = (new Carbon($prelevement->demande->date_resultat))->toDateString();

      $resultat['melange'] = ($prelevement->estMelange) ? 'oui' : 'non';
      $resultat['estParasite'] = ($prelevement->parasite) ? 'oui' : 'non';

      $resultats->push($resultat);

    }

    $resultatsExport = new ResultatsExportation($entetes, $resultats);

    return Excel::download($resultatsExport, 'copro.xlsx');

  }
  /**
  * Renvoie le nombre d'enregistrement en fonction des critères: especes, parasites, éleveur, veterinaire, dates
  */
  public function comptage(Request $request)
  {
    $resultats = $this->resultats($request->all());

    return $resultats->count();
  }

  public function export(Request $request)
  {
    $datas = $request->all();

    // Liste des parasites avec unité de comptage
    $anaitems = $this->anaitemsFromForm($datas);
    $anaitemsEntetes = $this->anaitemsEntete($anaitems);

    $entetes = array_merge([
    'animal_numero',
    'animal_nom',
    ],

    $anaitemsEntetes,

    [
    'date_prelevement',
    'date_resultat',
    'estParasite',
    'signes',
    'nom',
    'cp',
    'commune',
    'espece',
    'troupeau',
    'demande_id',
    'estMelange',
    ]);

    $resultats = $this->resultats($datas);

    $resultatsExport = new ResultatsExportation($entetes, $resultats);

    return Excel::download($resultatsExport, 'copro.'.$datas['format']);

  }

  /**
  * Fait la requete pour connnaitres les enregistrements correspondant aux critères
  */
  public function resultats($datas)
  {

    // On va chercher la liste des parasites concernés
    $anaitems = $this->anaitemsFromForm($datas);
    // Si on choisit toutes les especes, il faut aller chercher la totalité de id
    if ($datas['especes_export'][0] == "all") {

      $especes = Espece::all();

      foreach ($especes as $espece) {

        $liste_especes[] = $espece->id;

      }

    } else {

      $liste_especes = $datas['especes_export'];
    }


    // J'AVAIS TROUVE UN SUPER SYSTEME POUR TOUT FAIRE EN UNE LIGNE MAIS CA MARCHE PAS CHEZ OVH !
    // TODO: A AMELIORER CETTE HIDEUSE DOUBLE BOUCLE IF ELSE
    // $demandes = Demande::select('id')->where('user_id', 'like', $datas['eleveur'])
    // ->where('tovetouser_id', 'like', $datas['veto'])
    // ->whereIn('espece_id', $liste_especes)
    // ->where('date_prelevement', '>=', $datas['de'])
    // ->where('date_prelevement', '<=', $datas['a'])
    // ->get();
    if($datas['eleveur'] == "%"){

      if($datas['veto']== "%") {

        $demandes = Demande::select('id')
        ->whereIn('espece_id', $liste_especes)
        ->where('date_prelevement', '>=', $datas['de'])
        ->where('date_prelevement', '<=', $datas['a'])
        ->get();

      } else {

        $demandes = Demande::select('id')
        ->where('tovetouser_id', $datas['veto'])
        ->whereIn('espece_id', $liste_especes)
        ->where('date_prelevement', '>=', $datas['de'])
        ->where('date_prelevement', '<=', $datas['a'])
        ->get();

      }

    } else {

      if($datas['veto'] == "%") {

        $demandes = Demande::select('id')
        ->where('user_id', $datas['eleveur'])
        ->whereIn('espece_id', $liste_especes)
        ->where('date_prelevement', '>=', $datas['de'])
        ->where('date_prelevement', '<=', $datas['a'])
        ->get();

      } else {

        $demandes = Demande::select('id')
        ->where('tovetouser_id', $datas['veto'])
        ->where('user_id', $datas['eleveur'])
        ->whereIn('espece_id', $liste_especes)
        ->where('date_prelevement', '>=', $datas['de'])
        ->where('date_prelevement', '<=', $datas['a'])
        ->get();

      }
    }

    $prelevements = collect();

    foreach ($demandes as $demande) {
      $prelevement_par_demande = Prelevement::where('demande_id', $demande->id)->get();
      $prelevements = $prelevements->concat($prelevement_par_demande);
    }


    $resultats = collect();

    $existe_un_prelevement = false;

    foreach ($prelevements as $prelevement) {

      $resultat['animal_numero'] = $prelevement->animal->numero ?? $prelevement->identification;
      $resultat['animal_nom'] = $prelevement->animal->nom ?? '';

      foreach ($anaitems as $anaitem) {

        $resultat_du_prelevement = Resultat::where('prelevement_id', $prelevement->id)->where('anaitem_id', $anaitem->id)->first();

        if($resultat_du_prelevement !== null) {

          $existe_un_prelevement = true;
          $resultat[$anaitem->nom] = $resultat_du_prelevement->valeur;

        } else {

          $resultat[$anaitem->nom] = 'NA';
        }

      }
      $resultat['date_prelevement'] = $prelevement->demande->date_prelevement;
      $resultat['date_resultat'] = $prelevement->demande->date_resultat;
      $resultat['estParasite'] = ($prelevement->parasite) ? "oui" : "non";
      $resultat['signes'] = '';
      $resultat['nom'] = $prelevement->demande->user->name;
      $resultat['cp'] = $this->personne($prelevement->demande->user->id)->cp;
      $resultat['commune'] = $this->personne($prelevement->demande->user->id)->commune;
      $resultat['espece'] = $prelevement->demande->espece->nom;
      $resultat['troupeau'] = $prelevement->demande->troupeau->nom;
      $resultat['demande_id'] = $prelevement->demande->id;
      $resultat['estMelange'] = ($prelevement->estMelange === true) ? "oui" : "non";

      $resultats->push($resultat);
    }

    $resultats = ($existe_un_prelevement) ? $resultats : collect();

    return $resultats;
  }

  /**
  * Requête ajax dans la page choix pour afficher uniquement les parasites d'une espece donnée.
  */
  public function anaitemsFromEspece($especes)
  {
    $especes = explode(',', $especes);

    $analyses = Analyse::whereIn('espece_id', $especes)->get();
    $anaitems = collect();
    $analyses_id = [];
    foreach ($analyses as $analyse) {

      foreach ($analyse->anaitems as $anaitem) {

        $anaitems->push([ 'id' => $anaitem->id , 'nom' => ucfirst($anaitem->nom) ]);

      }
    }

    $anaitems = $anaitems->unique();

    $anaitems = $anaitems->sortBy('nom');

    return json_encode($anaitems->values()->all());
  }

  /**
  * Crée un array avec une liste d'anaitems pour pouvoir faire les entetes de colonnes
  */
  public function anaitemsEntete($anaitems) : Array
  {

    foreach ($anaitems as $anaitem) {

      $entetes[] = ($anaitem->unite->nom === '') ? $anaitem->nom : $anaitem->nom.' ('. $anaitem->unite->nom .')';

    }

    return $entetes;

  }

  public function anaitemsFromForm($datas) : Collection
  {
    if($datas['anaitems_export'][0] == "all") {

      $anaitems = Anaitem::all();

      foreach ($anaitems as $anaitem) {

        $liste_anaitems[] = $anaitem->id;

      }

    } else {

      $liste_anaitems = $datas['anaitems_export'];

    }
    // Liste des parasites
    $anaitems = Anaitem::select('id','unite_id','nom')->whereIn('id', $liste_anaitems)->get();

    return $anaitems;

  }

}
