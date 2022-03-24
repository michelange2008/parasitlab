<?php

namespace App\Http\Controllers\Analyses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Fournisseurs\ListeAnaactesFournisseur;

use App\Models\Analyses\Anaacte;
use App\Models\Analyses\Anatype;
use App\Models\Analyses\Tva;
use App\Models\Espece;
use App\Models\Age;
use App\Models\Icone;


use App\Http\Traits\LitJson;
use App\Http\Traits\AnaacteOutil;

/**
 * Controller CRUD pour gérer la classe Anaacte (unité de facturation)
 *
 * @package Analyses
 */
class AnaacteController extends Controller
{
    use LitJson, AnaacteOutil;

    protected $menu;

    public function __construct()
    {
      $this->menu = $this->litJson('menuLabo');
    }
    /**
     * Display a listing of the resource.
     *
     * Utilisation d'une classe ListeAnaactesFournisseur qui hérite de ListeFournisseur
     * destinée à mettre en forme les données pour l'affichage avec une vue unique
     *
     * @return \Illuminate\View\View amdin.index.pageIndex
     */
    public function index()
    {
      $anaactes = Anaacte::where('estAnalyse', true)->orderBy('num', 'asc')->get();

      foreach ($anaactes as $anaacte) {

        $anaacte = $this->formatPrix($anaacte);

      }

      $fournisseur = new ListeAnaactesFournisseur(); // voir class ListeFournisseur

      $datas = $fournisseur->renvoieDatas($anaactes, __('titres.list_anaactes'), "acte.svg", 'tableauAnaactes', 'anaactes.create', __('boutons.add_anaacte'));

      return view('admin.index.pageIndex', [
        'menu' => $this->menu,
        'datas' => $datas,
      ]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View admin\anaactes\anaacteCreate
     */
     public function create()
    {
      return view('admin.anaactes.anaacteCreate', [
        'menu' => $this->menu,
        'anatypes' => Anatype::all(),
        'icones' => Icone::all()->sortBy('nom'),
      ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $anaacte_nouveau = new Anaacte();

        $anaacte_nouveau->anatype_id = $request->anatype;
        $anaacte_nouveau->num = $request->num;
        $anaacte_nouveau->abbreviation = $request->abbreviation;
        $anaacte_nouveau->nom = $request->nom;
        $anaacte_nouveau->description = $request->description;
        $anaacte_nouveau->estActif = $request->estActif ?? 1;
        $anaacte_nouveau->estSerie = $request->estSerie;
        $anaacte_nouveau->estAnalyse = $request->estAnalyse;
        $anaacte_nouveau->estTarif = $request->estTarif;
        $anaacte_nouveau->pu_ht = $request->pu_ht;
        $anaacte_nouveau->icone_id = $request->icone_id;

        $anaacte_nouveau->save();

        return redirect()->route('anaactes.index')->with('messages', 'anaacte_store');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view('errors.entravaux');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $anaacte = Anaacte::find($id);

      return view('admin.anaactes.anaacte', [
        'menu' => $this->menu,
        'icones' => Icone::all()->sortBy('nom'),
        'anaacte' => $anaacte,
        'tvas' => Tva::all(),
      ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Redirect vers la méthode index
     */
    public function update(Request $request, $id)
    {

        $anaacte = Anaacte::find($id);

        $anaacte->abbreviation = $request->abbreviation;
        $anaacte->nom = $request->nom;
        $anaacte->description = $request->description;
        $anaacte->estActif = $request->estActif;
        $anaacte->estSerie = $request->estSerie;
        $anaacte->estAnalyse = $request->estAnalyse;
        $anaacte->estTarif = $request->estTarif;
        $anaacte->icone_id = $request->icone_id;
        $anaacte->pu_ht = $request->pu_ht;
        $anaacte->tva_id = $request->tva_id;

        $anaacte->save();

        return redirect()->route('anaactes.index')->with('message', 'anaacte_update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * NON ENCORE IMPLEMENTE !!!
     *
     * TODO: A FAIRE
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Anaacte::destroy($id);

        return redirect()->back()->with('message', 'anaacte_del');
    }

    public function age($age_id)
    {
      return view('admin.algorithme.animalAnaactesShow', [
        'menu' => $this->menu,
        'type' => 'age',
        'ages' => Age::all(),
        'especes' => Espece::all(),
        'animal' => Age::find($age_id),
        'anatypes' => Anatype::where('estAnalyse', 1)->get(),
      ]);
    }

    /**
     * Méthode associée à l'algorithme
     * @deprecated : Jamais utilisée ???
     * TODO à supprimer ?
     * @param  int $espece_id Id de l'Espece choisie
     * @return \Illuminate\View\View admin/algorithme/animalAnaactesShow
     */
    public function espece($espece_id)
    {
      return view('admin.algorithme.animalAnaactesShow', [
        'menu' => $this->menu,
        'type' => 'espece',
        'ages' => Age::all(),
        'especes' => Espece::all(),
        'animal' => Espece::find($espece_id),
        'anatypes' => Anatype::where('estAnalyse', 1)->get(),
      ]);
    }

    /**
     * Modification des associations entre anaacte et espece ou age
     *
     * Outil de gestion de l'Algorithme
     *
     * @deprecated N'est peut-être plus utilisée depuis la modification de l'algorithme
     * TODO: A supprimer ?
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function animalUpdate(Request $request, $id)
    {
      $datas = $request->all();

      $animal = ($request->type === "age") ? Age::find($id) : Espece::find($id);

      $anaactes_id = Collect();

      foreach ($datas as $key => $data) {

        if(explode('_', $key)[0] == "anaacte") {

          $anaactes_id->push(explode('_', $key)[1]);

        }

      }

      $animal->anaactes()->detach();
      $animal->anaactes()->attach($anaactes_id);

      return redirect()->back()->with('message', 'animal_anaacte_update');
    }

}
