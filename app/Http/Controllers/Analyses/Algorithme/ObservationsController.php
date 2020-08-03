<?php

namespace App\Http\Controllers\Analyses\Algorithme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Observation;
use App\Models\Categorie;
use App\Models\Option;
use App\Models\Analyses\Anatype;
use App\Models\Espece;
use App\Models\Age;

use App\Http\Traits\LitJson;
use App\Http\Traits\QuoteToChevron;
use App\Http\Traits\ObservationEdit;

class ObservationsController extends Controller
{
  use LitJson, QuoteToChevron, ObservationEdit;

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
        return view('admin.algorithme.observationsIndex', [
          'menu' => $this->menu,
          'observations' => Observation::all(),
          'categories' => Categorie::all(),
          'options' => Option::where('nom', '<>', null)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.algorithme.observationCreate', [
          'menu' => $this->menu,
          'observation_items' => $this->litJson('observationCreate'),
          'categories' => Categorie::all(),
          'especes' => Espece::all(),
          'ages' => Age::all(),
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

        $data_to_validate = $request->validate([
          'intitule' => 'required|max:191',
          'explication' => 'required|max:191',
          'autres' => 'max:191',
          'categorie' => 'required|numeric',
        ]);

        $nouvelle_observation = new Observation();
        $nouvelle_observation->intitule = $data_to_validate['intitule'];
        $nouvelle_observation->explication = $data_to_validate['explication'];
        $nouvelle_observation->autres = (isset($data_to_validate['autres'])) ? $data_to_validate['autres'] : null ;
        $nouvelle_observation->categorie_id = $data_to_validate['categorie'];
        $nouvelle_observation->ordre = 30;
        $nouvelle_observation->save();

        $datas_autre = $request->all();

        foreach ($datas_autre as $key => $data) {

          if(explode('_', $key)[0] === 'especes') {

            $nouvelle_observation->especes()->attach(explode('_', $key)[1]);

          } elseif (explode('_', $key)[0] === 'ages') {

            $nouvelle_observation->ages()->attach(explode('_', $key)[1]);

          } elseif (explode('_', $key)[0] === 'anatypes') {

            $nouvelle_observation->anatypes()->attach(explode('_', $key)[1]);

          }

        }

        return redirect()->route('observations.index')->with('message', 'observation_create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $observation = Observation::find($id);
        // Il faut tenir compte des doublons dans l'association observation/anatype qui sont destinés
        // à renforcer le poids d'un anatype pour une observation
        $liste_anatypes = Collect();

        $anatypes = $observation->anatypes;

        foreach($anatypes as $anatype) {

          $liste_anatypes->push($anatype->nom);

        }

        return view('admin.algorithme.observationShow', [
          'menu' => $this->menu,
          'observation' => $observation,
          'liste_anatypes' => $liste_anatypes->countBy(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.algorithme.observationEdit', [
          'menu' => $this->menu,
          'categories' => Categorie::all(),
          'observation_items' => $this->litJson('observationCreate'),
          'observation' => Observation::find($id),
        ]);
    }
    /**
     * modifie l'association d'une observation à une espece ou a un age
     *
     * @param int $id id de l'observation
     * @return \Illuminate\Http\Response
     */
    public function editAnimal($id)
    {

      return view('admin.algorithme.observationEditAnimal', [
        'menu' => $this->menu,
        'observation' => Observation::find($id),
        'especes' => Espece::all(),
        'ages' => Age::all(),
      ]);
    }

    /**
     * Modification des associations entre observation et option
     *
     * Undocumented function long description
     *
     * @param int $id id de l'observation
     * @return \Illuminate\Http\Response
     */
    public function editOption($id)
    {
      return view('admin.algorithme.observationEditOption', [
        'menu' => $this->menu,
        'observation' => Observation::find($id),
        'options' => Option::all(),
      ]);
    }

    /**
     * Modification des associations entre observation et anatype
     *
     * @param int $id id de l'observation
     * @return \Illuminate\Http\Response
     */
    public function editAnatype($id)
    {
      $observation = Observation::find($id);

      $anatypes_id = Collect();

      foreach ($observation->anatypes as $anatype) {

        $anatypes_id->push($anatype->id);
      }

      $anatypesAvecPoids = $anatypes_id->countBy();

      return view('admin.algorithme.observationEditAnatype' , [
        'menu' => $this->menu,
        'observation' => $observation,
        'anatypesAvecPoids' => $anatypesAvecPoids,
        'anatypes' => Anatype::where('estAnalyse', 1)->get(),
        'poids' => 0,
      ]);
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

        $observation = Observation::find($id);

        $datas = $request->all();

        switch ($datas['type']) {

          case 'animal':

            // Utilisation du trait ObservationEdit
            $this->updateAnimal($observation, $datas);

            break;

          case 'option':
            // Utilisation du trait ObservationEdit
            $this->updateOption($observation, $datas);

            break;

          case 'anatype':
            // Utilisation du trait ObservationEdit
            $this->updateanatype($observation, $datas);
            break;

          case 'observation':

            $this->updateObservation($observation, $datas);

            break;
          default:
            // code...
            break;
        }

        return redirect()->route('observations.show', $observation->id)->with('message' , 'observation_edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Observation::destroy($id);

      return redirect()->back()->with('message', 'observation_destroy');

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

      return view('admin.algorithme.animalObservationsShow', [
        'menu' => $this->menu,
        'animal' => $animal,
        'observations' => $observations_sort,
        'observations_actives' => $observations_actives,
        'categories' => $categories,
        'especes' => Espece::with('ages')->get(),
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

      return view('admin.algorithme.animalObservationsShow', [
        'menu' => $this->menu,
        'animal' => $animal,
        'observations' => $observations_sort,
        'observations_actives' => $observations_actives,
        'categories' => $categories,
        'especes' => Espece::with('ages')->get(),
      ]);
    }
    // Fonction qui reçoit la requete ajax pour associer ou dissocier age et observation
    public function especeObservation($espece_id, $observation_id)
    {
      $espece = Espece::find($espece_id);

      $action = $espece->observations()->toggle($observation_id);

      return $action;

    }

    // public function animalObservationStore(Request $request)
    // {
    //   dd($request->all());
    // }
}
