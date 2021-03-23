<?php

namespace App\Http\Controllers\Analyses\Algorithme;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Algorithme\Exclusion;
use App\Models\Age;
use App\Models\Espece;
use App\Models\Algorithme\Observation;
use App\Models\Analyses\Anatype;
use App\Models\Analyses\Anaacte;

use App\Http\Traits\LitJson;
use App\Http\Traits\EspecesAyantAges;

class ExclusionsController extends Controller
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
    return view('admin.algorithme.exclusionsIndex', [
      'menu' => $this->menu,
      'observations' => Observation::all(),
      'especes' => Espece::all(),
      'ages' => Age::all(),
      'exclusions' => Exclusion::all(),
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
    return view('admin.algorithme.exclusionCreate', [
    'menu' => $this->menu,
    'especes' => Espece::all(),
    'ages' => Age::all(),
    'observations' => Observation::all(),
    'anatypes' => Anatype::where('estAnalyse', 1)->get(),
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
    $animaux = Collect();
    $anatypes = Collect();

    foreach ($datas as $key => $data) {

      switch (explode('_', $key)[0]) {

        case 'age':

        $age_id = $data;
        $age = Age::find($age_id);
        $espece_id = $age->espece_id;
        $animal['age_id'] = $age_id;
        $animal['espece_id'] = $espece_id;
        $animaux->push($animal);

        break;

        case 'espece':

        $animal['espece_id'] = $data;
        $animal['age_id'] = null;
        $animaux->push($animal);

        break;

        case 'anatype':
          $anatype['anatype_id'] = $data;
          $anatypes->push($anatype);

          break;

        default:

        break;
      }
    }

    foreach ($animaux as $animal) {

      foreach ($anatypes as $anatype) {
        $nouvelle_donnee['observation_id'] = $datas['observation'];
        $nouvelle_donnee['espece_id'] = $animal['espece_id'];
        $nouvelle_donnee['age_id'] = $animal['age_id'];
        $nouvelle_donnee['anatype_id'] = $anatype['anatype_id'];

        Exclusion::firstOrCreate($nouvelle_donnee);
      }
    }

    return redirect()->route('exclusions.index')->with('message', 'exclusion_non_existe');

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
    Exclusion::destroy($id);

    return redirect()->back()->with('message', 'exclusion_del');
  }
  // Supprime un groupe d'exclusion correspondant à une observation (et plusieurs espèces et anatypes)
  public function destroyObservation($observation_id)
  {
    $exclusions = Exclusion::where('observation_id', $observation_id)->get();

    foreach ($exclusions as $exclusion) {

      Exclusion::destroy($exclusion->id);

    }

    return redirect()->back()->with('message', 'exclusion_del');

  }
  // Supprime un groupe d'exclusion correspondant à une espèce (et plusieurs anatypes)
  public function destroyEspece($observation_id, $espece_id)
  {
    $exclusions = Exclusion::where('observation_id', $observation_id)->where('espece_id', $espece_id)->get();

    foreach ($exclusions as $exclusion) {

      Exclusion::destroy($exclusion->id);

    }

    return redirect()->back()->with('message', 'exclusion_del');

  }
  // Supprime un groupe d'exclusion correspondant à un age (et plusieurs anatypes)
  public function destroyAge($observation_id, $age_id)
  {
    $exclusions = Exclusion::where('observation_id', $observation_id)->where('age_id', $age_id)->get();

    foreach ($exclusions as $exclusion) {

      Exclusion::destroy($exclusion->id);

    }

    return redirect()->back()->with('message', 'exclusion_del');

  }
}
