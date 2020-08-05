<?php

namespace App\Http\Controllers\Analyses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fournisseurs\ListeAnatypesFournisseur;

use App\Http\Traits\LitJson;

use \App\Models\Analyses\Anatype;
use \App\Models\Analyses\Anaitem;
use \App\Models\Icone;
use \App\Models\Espece;
use \App\Models\Age;

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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
        return view('admin.anatypes.anatype', [
          'menu' => $this->menu,
          'anatype' => Anatype::find($id),
          'anaitems' => Anaitem::all(),
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
        Anatype::destroy($id);

        return redirect()->back()->with('message', 'anatype_del');
    }

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
