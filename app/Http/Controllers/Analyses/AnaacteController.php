<?php

namespace App\Http\Controllers\Analyses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Fournisseurs\ListeAnaactesFournisseur;

use App\Models\Analyses\Anaacte;

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
        'anaacte' => $anaacte,
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
        //
    }

    public function age($age_id)
    {
      // code...
    }

    public function espece($espece_id)
    {
      // code...
    }

}
