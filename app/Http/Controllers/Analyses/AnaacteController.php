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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('errors.entravaux');

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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $anaacte = Anaacte::find($id);

        $anaacte->abbreviation = $request->abbreviation;
        $anaacte->nom = $request->nom;
        $anaacte->description = $request->description;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function animalUpdate(Request $request, $id)
    {
      $datas = $request->all();

      $animal = ($datas['type'] === "age") ? Age::find($id) : Espece::find($id);

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
