<?php

namespace App\Http\Controllers\Labo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Productions\Demande;
use App\Models\Espece;
use App\Models\Typeprod;
use App\Models\Productions\Etat;
use App\Models\Productions\Signe;

use App\Http\Traits\LitJson;


class PrelevementController extends Controller
{
    use LitJson;

    protected $menu;

    public function __construct()
    {
      $this->menu = $this->litJson("menuLabo");
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

    public function createOnDemande($demande_id)
    {
      return view('labo.prelevementOnDemande', [
        'menu' => $this->menu,
        'demande' => Demande::find($demande_id),
        'especes' => Espece::all(),
        'typeprods' => Typeprod::all(),
        'etats' => Etat::all(),
        'signes' => Signe::all(),
        'estParasite' => $this->litJson('estParasite'),
      ]);
    }

    public function storeOnDemande(Request $request)
    {

      $datas = $request->all();

      dd($datas);

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
