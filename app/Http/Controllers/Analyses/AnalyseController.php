<?php

namespace App\Http\Controllers\Analyses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fournisseurs\ListeAnalysesFournisseur;

use App\Models\Analyses\Analyse;

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

        return view('errors.entravaux');
    }

    /**
     * Non implémenté: Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Non implémenté: Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Non implémenté: Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      return view('errors.entravaux');

    }

    /**
     * Met à jour les associations entre analyse et anaitem.
     *
     * Cette méthode est appelée par la vue admin/anatypes/anatype.blade.php qui
     * un formulaire pour modifier l'association entre un anatype et une espèce.
     *
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
     * Non implémenté: Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Analyse::destroy($id);

        return redirect()->back()->with("message", 'analyse_del');
    }
}
