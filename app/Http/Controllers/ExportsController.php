<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Espece;
use App\Models\Productions\Demande;
use App\Models\Productions\Prelevement;
use App\Models\Productions\Resultat;
use App\Models\Productions\Export;
use App\Models\Analyses\Anaitem;
use App\Models\Analyses\Analyse;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ResultatsExport;
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

    public function demande($demande_id)
    {
      $demande = Demande::find($demande_id);

      $prelevements = Prelevement::where('demande_id', $demande_id)->get();

      Export::truncate();

      $liste_resultats = collect();

      foreach ($prelevements as $prelevement) {

        $resultats = Resultat::where('prelevement_id', $prelevement->id)->get();

        $liste_resultats = $liste_resultats->concat($resultats);

      }

      foreach ($liste_resultats as $resultat) {

        $this->exportFactory($resultat);

      }

      return Excel::download(new ResultatsExport, 'copro.xlsx');

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

      return Excel::download(new ResultatsExport, 'copro.'.$datas['format']);

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

      $demandes = Demande::select('id')->where('user_id', 'like', $datas['eleveur'])
      ->where('tovetouser_id', 'like', $datas['veto'])
      ->whereIn('espece_id', $liste_especes)
      ->where('date_prelevement', '>=', $datas['de'])
      ->where('date_prelevement', '<=', $datas['a'])
      ->get();

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
dd($prelevements);
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
      $export->animal_numero = $resultat->prelevement->animal->numero;
      $export->animal_nom = $resultat->prelevement->animal->nom;
      $export->date_prelevement = $resultat->prelevement->demande->date_prelevement;
      $export->date_resultat = $resultat->prelevement->demande->date_resultat;
      $export->parasite = $resultat->anaitem->nom;
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
