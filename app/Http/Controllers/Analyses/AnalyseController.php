<?php

namespace App\Http\Controllers\Analyses;

use Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fournisseurs\ListeAnalysesFournisseur;

use App\Models\Analyses\Analyse;
use \App\Models\Analyses\Anatype;
use \App\Models\Icone;
use \App\Models\Espece;

use App\Http\Traits\LitJson;

/**
 * Controleur pour la classe Analyse: association d'un anatype et d'une espèce.
 *
 * En fait c'est normalement un contrôleur CRUD mais il n'a pas été implémenté
 * complètement: Seule la méthode index fonctionne (mais il n'y a pas d'item de
 * menu qui y conduit).
 *
 * Par contre la méthode update est utilisée pour la mise jour des associations
 * anatype - espèce.
 *
 * @package Analyses
 */
class AnalyseController extends Controller
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
     * Non utilisé (pas de memu qui y mène) même si ça fonctionne.
     *
     * A recours à une classe héritée de ListeFournisseur comme pour tous les
     * affichages de ce type.
     *
     * @return \Illuminate\View\View admin.page.pageIndex
     */
    public function index()
    {
        $analyses = Analyse::all();


        $fournisseur = new ListeAnalysesFournisseur(); // voir class ListeFournisseur

        $datas = $fournisseur->renvoieDatas($analyses, __('titres.list_analyses'), "analyse.svg", 'tableauAnalyses', 'analyses.create', __('boutons.add_analyse'));

        return view('admin.index.pageIndex', [
          'menu' => $this->menu,
          'datas' => $datas,
        ]);

    }

    /**
     * Non implémenté: Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.analyses.analyseCreate', [
          'menu' => $this->menu,
          'icones' => Icone::all(),
          'anatypes' => Anatype::all(),
          'especes' => Espece::all(),
        ]);
    }

    /**
     * Non implémenté: Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =$request->validate([
          'espece_id' => 'required',
          'anatype_id' => 'required'
        ]);

        $nouvelle_analyse = Analyse::firstOrNew(
          ['nom' => $request->nom],
          [
            'anatype_id' => $request->anatype_id,
            'espece_id' => $request->espece_id,
            'icone_id' => (is_null($request->icone_id)) ? "39" : $request->icone_id,
            'explication' => $request->explication,
            'ordre' => 0,
            'important' => 0,
          ]
        );
        $nouvelle_analyse->save();

        return redirect()->route('analyses.index')->with('message', 'analyse_create');
    }

    /**
     * Non implémenté: Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Pour voir et modifier un analyse
     */
    public function edit($id)
    {
      return view('admin.analyses.analyseEdit', [
        'menu' => $this->menu,
        'analyse' => Analyse::find($id),
        'icones' => Icone::all(),
        'anatypes' => Anatype::all(),
        'especes' => Espece::all(),
      ]);

    }

    /**
     * Met à jour une analyse
     *
     */
    public function update(Request $request, $id)
    {
      log::info($request);
      $analyse = Analyse::find($id);
      $analyse->nom = $request->nom;
      $analyse->explication = $request->explication;
      $analyse->espece_id = $request->espece_id;
      $analyse->anatype_id = $request->anatype_id;
      $analyse->icone_id = $request->icone_id;

      $analyse->save();

      return redirect()->route('analyses.index')->with('message', 'analyse_update');
    }

    /**
     *
     */
    public function destroy($id)
    {
        Analyse::destroy($id);

        return redirect()->back()->with("message", 'analyse_del');
    }
}
