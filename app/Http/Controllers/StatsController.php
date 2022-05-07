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


class StatsController extends Controller
{
  use LitJson, FactureFactory;

  protected $menu;

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('labo');

    $this->menu = $this->litJson('menuLabo');

  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $statsBase = $this->litJson('statsBase');
    $statsBase->nb_demandes->count = Demande::count();
    $statsBase->nb_prelevements->count = Prelevement::count();
    $statsBase->nb_eleveurs->count = Eleveur::count();
    $factures = Facture::where('user_id', '<>', 0)->get();
    $total_factures = 0;
    foreach ($factures as $facture) {
      $total_factures += $this->calculFactureHT($facture);
    }
    $total_factures = number_format($total_factures, 2, ",", " ")." €";

    $statsBase->total_factures->count = $total_factures;

    return view('admin.stats.statsIndex', [
    'menu' => $this->menu,
    'statsBase' => $statsBase,
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
    $prelevements = Prelevement::selectRaw('year(created_at) year, monthname(created_at) month, count(*) data')
    ->groupBy('year', 'month')
    ->orderBy('year', 'desc')
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
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
