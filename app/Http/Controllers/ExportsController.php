<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
use App\Exports\ResultatsExport;
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

    public function entetes($demande)
    {

      $analyse = Analyse::where('espece_id', $demande->espece_id)
      ->where('anatype_id', $demande->anaacte->anatype_id)
      ->first();

      $anaitems = $analyse->anaitems;

      $entete[] = 'Identification';
      $entete[] = 'Nom';

      foreach ($anaitems as $anaitem) {

        $entete[] = $anaitem->nom.' ('. $anaitem->unite->nom .')';

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

      $entetes = $this->entetes($demande);

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

      $resultats = $this->resultats($datas);
      Export::truncate();

      foreach ($resultats as $resultat) {
        // Crée un objet export et le sauve en base de donnée
        $this->exportFactory($resultat);

      }

      $entetes = [
        'id',
        'nom',
        'cp',
        'commune',
        'espece',
        'troupeau',
        'demande_id',
        'resultat_id',
        'estMelange',
        'animal_numero',
        'animal_nom',
        'date_prelevement',
        'date_resultat',
        'parasite',
        'positif',
        'valeur',
        'estParasite',
        'signes',
      ];

      return Excel::download(new ResultatsExport($entetes), 'copro.'.$datas['format']);

  }

  /**
  * Fait la requete pour connnaitres les enregistrements correspondant aux critères
  */
    public function resultats($datas)
    {
      // Si on choisit toutes les especes, il faut aller chercher la totalité de id
      if ($datas['especes'][0] == "all") {

        $especes = Espece::all();

        foreach ($especes as $espece) {

          $liste_especes[] = $espece->id;

        }

      } else {

        $liste_especes = $datas['especes'];
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

      if($datas['anaitems'][0] == "all") {

        $anaitems = Anaitem::all();

        foreach ($anaitems as $anaitem) {

          $liste_anaitems[] = $anaitem->id;

        }

      } else {

        $liste_anaitems = $datas['anaitems'];

      }

      $resultats = collect();

      foreach ($prelevements as $prelevement) {
        $resultats_par_prelevement = Resultat::where('prelevement_id', $prelevement->id)
        ->whereIn('anaitem_id', $liste_anaitems)
        ->get();
        $resultats = $resultats->concat($resultats_par_prelevement);
      }

      return $resultats;
    }

    public function exportFactory($resultat)
    {

      $export = new Export;

      $export->nom = $resultat->prelevement->demande->user->name;
      $export->cp = $this->personne($resultat->prelevement->demande->user->id)->cp;
      $export->commune = $this->personne($resultat->prelevement->demande->user->id)->commune;
      $export->espece = $resultat->prelevement->demande->espece->nom;
      $export->troupeau = $resultat->prelevement->demande->troupeau->nom;
      $export->demande_id = $resultat->prelevement->demande->id;
      $export->resultat_id = $resultat->id;
      $export->estMelange = $resultat->prelevement->estMelange;
      $export->animal_numero = $resultat->prelevement->animal->numero ?? $resultat->prelevement->identification;
      $export->animal_nom = $resultat->prelevement->animal->nom ?? '';
      $export->date_prelevement = $resultat->prelevement->demande->date_prelevement;
      $export->date_resultat = $resultat->prelevement->demande->date_resultat;
      $export->parasite = $resultat->anaitem->nom;
      $export->positif = $resultat->positif;
      $export->valeur = $resultat->valeur;
      $export->estParasite = $resultat->prelevement->parasite;

      $signes = "";
      if($resultat->prelevement->signes->count() > 0) {
        foreach ($resultat->prelevement->signes as $signe) {
          $signes = $signes.",".__($signe->nom);
        }
      }
      $export->signes = substr($signes, 1);

      $export->save();

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
  }
