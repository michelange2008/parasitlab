<?php

namespace App\Http\Controllers\Analyses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fournisseurs\ListeAnatypesFournisseur;

use App\Http\Traits\LitJson;

use \App\Models\Analyses\Anatype;
use \App\Models\Analyses\Anaitem;
use \App\Models\Analyses\Analyse;
use \App\Models\Icone;
use \App\Models\Espece;
use \App\Models\Age;

/**
 * Controleur de la classe Anatype (Analyse choisie par le demandeur)
 *
 * Contrôleur CRUD avec quelques particularités:
 * + La méthode _show_ n'est pas implémentée car fusionnée avec edit
 * + La méthode _update_ est implémentée par la méthode update de AnalyseController
 * + Trois méthodes supplémentaires existent: _age_, _espece_, _animalUpdate_
 * associées au paramétrage de l'algorithme.
 *
 *
 * @package Analyses
 */
class AnatypeController extends Controller
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
     * Utilise (comme dans tous les index) une classe héritée de ListeFournisseur (ListeAnaTypesFournisseur)
     * @see App\Fournisseurs\ListeAnaTypesFournisseur
     *
     * @return \Illuminate\View\View admin/index/pageIndex
     */
    public function index()
    {
      $anatypes = Anatype::all();

      $fournisseur = new ListeAnaTypesFournisseur(); // voir class ListeFournisseur

      $datas = $fournisseur->renvoieDatas($anatypes, __('titres.list_types'), "acte.svg", 'tableauAnatypes', 'anatypes.create', __('boutons.add_type'));

      return view('admin.index.pageIndex', [
        'menu' => $this->menu,
        'datas' => $datas,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View admin/anatypes/anatypeCreate
     */
    public function create()
    {
      return view('admin.anatypes.anatypeCreate', [
        'menu' => $this->menu,
        'icones' => Icone::all()->sortBy('nom'),
      ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Redirect index
     */
    public function store(Request $request)
    {
        $datas = $request->all();

        $nouvel_anatype = new Anatype();

        $nouvel_anatype->abbreviation = $request->abbreviation;
        $nouvel_anatype->nom = $request->nom;
        $nouvel_anatype->technique = $request->technique;
        $nouvel_anatype->estAnalyse = $request->estAnalyse;
        $nouvel_anatype->icone_id = $request->icone_id;

        $nouvel_anatype->save();

        return redirect()->route('anatypes.index')->with('message', 'anatype_add');

    }

    /**
     * Non implémentée: Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View admin/anatypes/anatype
     */
    public function edit($id)
    {
        return view('admin.anatypes.anatype', [
          'menu' => $this->menu,
          'anatype' => Anatype::find($id),
          'anaitems' => Anaitem::all(),
        ]);
    }

    /**
     *  Update the specified resource in storage.
     * Met à jour les associations entre analyse et anaitem.
     *
     * Cette méthode est appelée par la vue admin/anatypes/anatype.blade.php qui
     * un formulaire pour modifier l'association entre un anatype et une espèce.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id Id de l'Anatype
     */
    public function update(Request $request, $id)
    {
      $datas = $request->all();
      // On récupère le préfixe qui permet de repérer les anaitems
      $prefixe = $datas['prefixe'];
      // On crée une collection vide
      $liste_anaitems_id = [];

      foreach ($datas as $key => $element) {
        // On explose les datas
        if(explode('_', $key)[0] === $prefixe) {
          // Pour ne récupérer que celles conernant les anaitems qu'on ajoute à la liste
          $liste_anaitems_id[] = $element;

        }

      }
      // On récupère l'analyse
      $analyse = Analyse::find($id);
      // On enlève toutes les associations entre cette analyse et les anaitems
      $analyse->anaitems()->detach($analyse->anaitems);
      // On recrée ces mêmes associations avec la nouvelle liste
      $analyse->anaitems()->attach($liste_anaitems_id);
      // Et on renvoie à la même page
      return redirect()->route('anatypes.edit', $datas['anatype_id'])->with('message', 'anatype_update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Redirect index
     */
    public function destroy($id)
    {
        Anatype::destroy($id);

        return redirect()->back()->with('message', 'anatype_del');
    }

    /**
     * Méthode utilisée pour le paramétrage de l'algorithme de choix et qui renvoie
     * une vue formulaire
     *
     * Permet de modifier les anatypes associées à âge donné
     *
     * Route _algorithme/analyses/age/{age id}_
     *
     * @param  [type] $age_id Id de l'Age
     * @return \Illuminate\View\View admin/algorithme/animalAnatypesShow
     */
    public function age($age_id)
    {
      return view('admin.algorithme.animalAnatypesShow', [
        'menu' => $this->menu,
        'type' => 'age',
        'ages' => Age::all(),
        'especes' => Espece::all(),
        'animal' => Age::find($age_id),
        'anatypes' => Anatype::where('estAnalyse', 1)->get(),
      ]);
    }

    /**
     * Méthode utilisée pour le paramétrage de l'algorithme de choix et qui renvoie
     * une vue formulaire
     *
     * Permet de modifier les anatypes associées à une espèce donnée
     *
     * Route _algorithme/analyses/espece/{espece id}_
     *
     * @param  [type] $age_id Id de l'Espece
     * @return \Illuminate\View\View admin/algorithme/animalAnatypesShow
     */
    public function espece($espece_id)
    {

      return view('admin.algorithme.animalAnatypesShow', [
        'menu' => $this->menu,
        'type' => 'espece',
        'ages' => Age::all(),
        'especes' => Espece::all(),
        'animal' => Espece::find($espece_id),
        'anatypes' => Anatype::where('estAnalyse', 1)->get(),
      ]);
    }

    /**
     * Modification des associations entre Anatype et Espece ou Age
     *
     * Cela explique le recours à la dénomination animalUpdate qui peut paraître
     * introduire de la confusion car il n'y a aucun rapport avec le modèle Animal
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id Id de l'Espece ou de l'Age
     * @return Redirect back (AnatypeController@age ou AnatypeController@espece)
     */
    public function animalUpdate(Request $request, $id)
    {
      $datas = $request->all();

      $animal = ($datas['type'] === "age") ? Age::find($id) : Espece::find($id);

      $anatypes_id = Collect();

      foreach ($datas as $key => $data) {

        if(explode('_', $key)[0] == "anatype") {

          $anatypes_id->push(explode('_', $key)[1]);

        }

      }

      $animal->anatypes()->detach();
      $animal->anatypes()->attach($anatypes_id);

      return redirect()->back()->with('message', 'animal_anatype_update');
    }
}
