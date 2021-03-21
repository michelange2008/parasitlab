<?php

namespace App\Http\Controllers\Analyses\Algorithme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Algorithme\ExclusionsAnaacte;
use App\Models\Age;
use App\Models\Espece;
use App\Models\Algorithme\Observation;
use App\Models\Analyses\Anatype;
use App\Models\Analyses\Anaacte;

use App\Http\Traits\LitJson;
use App\Http\Traits\EspecesAyantAges;

class ExclusionsAnaacteController extends Controller
{
  use LitJson, EspecesAyantAges;

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
      'observations' => Observation::orderBy('categorie_id', 'asc')->orderBy('ordre', 'asc')->get(),
      'exclusions' => ExclusionsAnaacte::all(),
      'ages' => Age::all(),
      'especes' => Espece::all(),
      'anaactes' => Anaacte::all(),
      'liste_especes_avec_age' => $this->especesAyantAges(),
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
    'observations' => Observation::orderBy('categorie_id', 'asc')->orderBy('ordre', 'asc')->get(),
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

    $nouvelles_donnees = Collect();

    foreach ($datas as $key => $data) {

      $type_animal = explode('_', $key)[0];

      switch ($type_animal) {

        case 'age':

        $age_id = $data;
        $age = Age::find($age_id);
        $espece_id = $age->espece_id;
        $nouvelles_donnees->push([
          "espece_id" => $espece_id,
          "age_id" => $age_id,
          "observation_id" => $datas['observation']
        ]);

        break;

        case 'espece':

        $nouvelles_donnees->push([
          "espece_id" => $data,
          "age_id" => null,
          "observation_id" => $datas['observation'],
        ]);

        break;

        default:

        break;
      }

    }

    foreach($datas as $key => $data) {

      if(explode('_', $key)[0] === 'anaacte') {

        foreach ($nouvelles_donnees as $nouvelle_donnee) {

          $nouvelle_donnee['anaacte_id'] = $data;

          $exclusion_nouvelle = ExclusionsAnaacte::firstOrCreate($nouvelle_donnee);

        }

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

  // Supprime un groupe d'exclusion correspondant à une observation (et plusieurs espèces et anaactes)
  public function destroyObservation($observation_id)
  {
    $exclusions = ExclusionsAnaacte::where('observation_id', $observation_id)->get();

    foreach ($exclusions as $exclusion) {

      ExclusionsAnaacte::destroy($exclusion->id);

    }

    return redirect()->back()->with('message', 'exclusion_del');

  }
  // Supprime un groupe d'exclusion correspondant à une espèce (et plusieurs anaactes)
  public function destroyEspece($observation_id, $espece_id)
  {
    $exclusions = ExclusionsAnaacte::where('observation_id', $observation_id)->where('espece_id', $espece_id)->get();

    foreach ($exclusions as $exclusion) {

      ExclusionsAnaacte::destroy($exclusion->id);

    }

    return redirect()->back()->with('message', 'exclusion_del');

  }
  // Supprime un groupe d'exclusion correspondant à un age (et plusieurs anaactes)
  public function destroyAge($observation_id, $age_id)
  {
    $exclusions = ExclusionsAnaacte::where('observation_id', $observation_id)->where('age_id', $age_id)->get();

    foreach ($exclusions as $exclusion) {

      ExclusionsAnaacte::destroy($exclusion->id);

    }

    return redirect()->back()->with('message', 'exclusion_del');

  }
}
