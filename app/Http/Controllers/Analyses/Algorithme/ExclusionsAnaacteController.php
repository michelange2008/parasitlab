<?php

namespace App\Http\Controllers\Analyses\Algorithme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExclusionsAnaacte;
use App\Models\Age;
use App\Models\Espece;
use App\Models\Observation;
use App\Models\Analyses\Anatype;
use App\Models\Analyses\Anaacte;

use App\Http\Traits\LitJson;

class ExclusionsAnaacteController extends Controller
{
  use LitJson;

  protected $menu;

  public function __construct()
  {
    $this->menu = $this->litJson('menuLabo');
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('admin.algorithme.exclusionsAnaacteIndex', [
      'menu' => $this->menu,
      'exclusions' => ExclusionsAnaacte::all()->groupBy(['espece_id', 'observation_id']),
      'ages' => Age::all(),
      'especes' => Espece::all(),
      'observations' => Observation::all(),
      'anaactes' => Anaacte::all(),
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('admin.algorithme.exclusionsAnaacteCreate', [
    'menu' => $this->menu,
    'especes' => Espece::all(),
    'ages' => Age::all(),
    'observations' => Observation::all(),
    'anatypes' => Anatype::where('estAnalyse', 1)->get(),
    'anaactes' => Anaacte::where('estAnalyse', 1)->get(),
    ]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $datas = $request->all();

    $age_id = null;
    $espece_id = null;

    foreach ($datas as $key => $data) {

      if ($key === "animaux") {

        $data_tab = explode('_', $data);

        switch ($data_tab[0]) {

          case 'age':

          $age_id = $data_tab[1];
          $age = Age::find($age_id);
          $espece_id = $age->espece_id;

          break;

          case 'espece':

          $espece_id = $data_tab[1];

          break;

          default:

          break;
        }

      }

    }

    $donnees_nouvelles = [
    'espece_id' => $espece_id,
    'age_id' => $age_id,
    'observation_id' => $datas['observation'],
    ];

    foreach($datas as $key => $data) {

      if(explode('_', $key)[0] === 'anaacte') {

        $donnees_nouvelles['anaacte_id'] = $data;

        $exclusion_nouvelle = ExclusionsAnaacte::firstOrCreate($donnees_nouvelles);

      }

    }

    return redirect()->route('exclusionsAnaacte.index')->with('message', 'exclusion_non_existe');

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {

    ExclusionsAnaacte::destroy($id);

    return redirect()->back()->with('message', 'exclusion_del');
  }
}
