<?php

namespace App\Http\Controllers\Analyses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fournisseurs\ListeAnapacksFournisseur;

use App\Models\Analyses\Anapack;

use App\Http\Traits\LitJson;

class AnapackController extends Controller
{
    use LitJson;

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
      $anapacks = Anapack::all();

      $fournisseur = new ListeAnapacksFournisseur(); // voir class ListeFournisseur

      $datas = $fournisseur->renvoieDatas($anapacks, "Liste des packs d'analyse", "pack.svg", 'tableauAnapacks', 'anapacks.create', "Ajouter un nouvel pack");

      return view('admin.index.pageIndex', [
        'menu' => $this->menu,
        'datas' => $datas,
      ]);

    }

    /**
    *
    * Méthode qui renvoie un booleen : true si l'anapack correspond à une serie, false dans le cas contraire
    *
    */
    public function estSerie($anapack_id)
    {
      $anapack = Anapack::find($anapack_id);

      return $anapack->serie;
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
        //
    }
}
