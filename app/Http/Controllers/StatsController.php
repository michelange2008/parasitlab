<?php

namespace App\Http\Controllers;

use Log;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Eleveur;
use App\Models\Productions\Demande;
use App\Models\Productions\Prelevement;
use App\Models\Productions\Facture;
use App\Models\Analyses\Anaacte;

use App\Http\Traits\LitJson;
use App\Http\Traits\FactureFactory;
use App\Http\Traits\StatsBase;

class StatsController extends Controller
{
  use StatsBase, LitJson, FactureFactory;

  protected $menu;

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('labo');

    $this->menu = $this->litJson('menuLabo');

  }
  /**
  * Renvoie les stats de base
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('admin.stats.statsIndex', [
    'menu' => $this->menu,
    'statsBase' => $this->renvoieStatsBase(),
    ]);
  }
  /**
   * Renvoie un tableau avec le nombre d'analyses par mois et par année
   *
   * @return return json pour requete ajax
   */
  public function analyseParMois()
  {
    // On récupère le nombre de prélèvements groupés par année et par mois
    $demandes_prestations = Demande::select('id')->where('userfact_id', 0)->get();
    $demandes_prest_id = [];
    foreach($demandes_prestations->toArray() as $id) {
      $demande_prest_id[] = $id['id'];
    }
    $prelevements = Prelevement::selectRaw('year(created_at) year, monthname(created_at) month, count(*) data')
    ->groupBy('year', 'month')
    ->orderBy('year', 'desc')
    ->whereIn('demande_id', $demande_prest_id)
    ->get();

    // On regroupe par année et on transforme la Collection en Array
    $grouped = $prelevements->groupBy('year')->toArray();
    // On récupère la liste des mois avec la correspondance entre anglais et français
    $liste_mois = $this->litJson('listeMois');
    // On crée un tableau vide qui contiendra les données
    $datas = [];
    // On boucle sur les années
    foreach ($grouped as $year => $month_nb) {
      // On boucle sur le tableau de correspondance des mois
      foreach ($liste_mois as $month => $mois) {
        // On remplit le tableau avec 0 pour chaque mois
        $datas[$year][$mois] = 0;
        // On boucle sur les mois du tableau prélèvements
        foreach ($month_nb as $val) {
          // si on trouve le mois correspondant
          if(strtolower($val['month']) == $month) {
            // on ajoute la valeur pour ce mois là
            $datas[$year][$mois] = $val['data'];
          }
        }
      }
    }
    return json_encode($datas);
  }

  public function analyseParEspece()
  {
    $prelevements = DB::table('prelevements')
      ->join('demandes', 'prelevements.demande_id', '=', 'demandes.id')
      ->join('especes', 'demandes.espece_id', '=', 'especes.id')
      ->select('especes.nom', DB::raw('count(*) as total'))
      ->groupBy('especes.nom')
      ->get();
    return json_encode($prelevements->all());
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function annuel()
  {
    $init = 2021;
    $fin = Carbon::now()->year;
    $libelles = [
      "Année",
      'Nombre de demandes extérieures',
      'Nombre de demandes internes',
      "Nombre d'analyses extérieures",
      "Nombre d'analyses internes",
      "Motant total des factures"
    ];
    $datas = [];
    $demandesExtTot = 0;
    $demandesLaboTot = 0;
    $prelExtTot = 0;
    $prelLaboTot = 0;
    $facturesTot = 0;
    for($i = $fin; $i >= $init; $i--) {
      $demandesExt = Demande::whereYear('date_reception', $i)
                          ->where('userfact_id', '<>', 0)
                          ->count();
      $demandesExtTot += $demandesExt;
      $datas[$i]['demandesExt'] = $demandesExt;
      $demandesLabo = Demande::whereYear('date_reception', $i)
                          ->where('userfact_id', '=', 0)
                          ->count();
      $demandesLaboTot += $demandesLabo;
      $datas[$i]['demandesLabo'] = $demandesLabo;
      $prelExt = DB::table('prelevements')
                ->join('demandes', 'demandes.id', 'prelevements.demande_id')
                ->whereYear('demandes.date_reception', $i)
                ->where('demandes.userfact_id', '<>', 0)
                ->count();
      $prelExtTot += $prelExt;
      $datas[$i]['prelExt'] = $prelExt;
      $prelLabo = DB::table('prelevements')
                ->join('demandes', 'demandes.id', 'prelevements.demande_id')
                ->whereYear('demandes.date_reception', $i)
                ->where('demandes.userfact_id', '=', 0)
                ->count();
      $prelLaboTot += $prelLabo;
      $datas[$i]['prelLabo'] = $prelLabo;
      $factures =  number_format($this->facturesExtAnnuel($i), 2, ",", " ")." €";
      $facturesTot += $this->facturesExtAnnuel($i);
      $datas[$i]['factures'] = $factures;

    }
    dump($datas);
    $facturesTot = number_format($facturesTot, 2, ",", " ")." €";



    dd($prelLabo);
  }

  /**
  * Calcul le montant des factures extérieures pour 1 année
  *
  * @param  int $year année pour laquelle on veut les statistiques
  * @return float $total total des factures faites une année donnée
  */
  public function facturesExtAnnuel(Int $year)
  {
    $factures = Facture::whereYear('faite_date', '=', $year)->get();
    // On procède au calcul de chaque facture
    foreach ($factures as $facture) {
      $somme_facture = $this->calculSommeFacture($facture);
      $facture->total_ht = $somme_facture->total_ht;
      $facture->total_ttc = $somme_facture->total_ttc;
    }
    $total = 0;
    foreach($factures as $facture) {

      if($facture->user->usertype->nom != "laboratoire") {

        $total += floatval($facture->total_ht);
      }

    }

    return $total;
  }

}