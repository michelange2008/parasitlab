<?php

namespace App\Http\Controllers\Analyses\Algorithme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Observation;
use App\Models\Categorie;

use App\Models\Espece;
use App\Models\Age;

use App\Http\Traits\LitJson;
use App\Http\Traits\QuoteToChevron;

class ObservationsController extends Controller
{
  use LitJson, QuoteToChevron;

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
        //
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
        $datas = $request->all();

        if(isset($datas['intitule'])) {

          $intitule = strip_tags($this->quoteToChevron($datas['intitule']));

        } else {
          $intitule = "---- vide ----";
        }

        $explication = ($datas['explication']) ? strip_tags($datas['explication']) : "";
        $autres = ($datas['autres']) ? strip_tags($datas['autres']) : null;
        $ordre = ($datas['ordre']) ? strip_tags($datas['ordre']) : 1;
        $categorie_id = ($datas['categorie']) ? $datas['categorie'] : 1;

        Observation::where('id', $id)
                        ->update([
                          'intitule' => $intitule,
                          'explication' => $explication,
                          'autres' => $autres,
                          'categorie_id' => $categorie_id,
                          'ordre' => $ordre
                        ]);
        $observation = Observation::where('id', $id)->with('categorie')->get();

        return $observation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    // Fonction qui affiche la table des observations en fonction de l'age
    public function age($age_id)
    {
      $animal = Age::find($age_id);

      $categories = Categorie::all();

      $observations = Observation::all()->sortBy('categorie_id');

      // Trier sur un deuxième critère qui est l'ordre
      $observations_sort = Collect();

      foreach ($categories as $categorie) {
        $sousObs = $observations->where('categorie_id', $categorie->id);
        $sousObs_sort = $sousObs->sortBy('ordre');
        $observations_sort = $observations_sort->concat($sousObs_sort);
      }

      // Observation liée à cet age précis
      $observations_actives = $animal->observations()->get();

      return view('admin.algorithme.observations', [
        'menu' => $this->menu,
        'animal' => $animal,
        'observations' => $observations_sort,
        'observations_actives' => $observations_actives,
        'categories' => $categories,
      ]);
    }
    // Fonction qui reçoit la requete ajax pour associer ou dissocier age et observation
    public function ageObservation($age_id, $observation_id)
    {
      $age = Age::find($age_id);

      $action = $age->observations()->toggle($observation_id);

      return $action;

    }
    // Fonction qui affiche la table des observations en fonction de l'espece
    public function espece($espece_id)
    {
      $animal = Espece::find($espece_id);

      $categories = Categorie::all();

      $observations = Observation::all()->sortBy('categorie_id');

      // Trier sur un deuxième critère qui est l'ordre
      $observations_sort = Collect();

      foreach ($categories as $categorie) {
        $sousObs = $observations->where('categorie_id', $categorie->id);
        $sousObs_sort = $sousObs->sortBy('ordre');
        $observations_sort = $observations_sort->concat($sousObs_sort);
      }

      // Observation liée à cet age précis
      $observations_actives = $animal->observations()->get();

      return view('admin.algorithme.observations', [
        'menu' => $this->menu,
        'animal' => $animal,
        'observations' => $observations_sort,
        'observations_actives' => $observations_actives,
        'categories' => $categories,
      ]);
    }
    // Fonction qui reçoit la requete ajax pour associer ou dissocier age et observation
    public function especeObservation($espece_id, $observation_id)
    {
      $espece = Espece::find($espece_id);

      $action = $espece->observations()->toggle($observation_id);

      return $action;

    }

    public function animalObservationStore(Request $request)
    {
      dd($request->all());
    }
}
