<?php

namespace App\Http\Controllers\Labo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productions\Demande;
use App\Models\Productions\Serie;
use App\Http\Traits\LitJson;
use App\Http\Traits\SerieFactory;

class SerieController extends Controller
{

    use LitJson, SerieFactory;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('labo');
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
        $serie = Serie::find($id);

        $serieTableau = $this->construitTableauResultats($serie);

        $demandes = Demande::where('serie_id', $id)->orderBy('date_reception', 'asc')->get();

        $identique = $this->identificationsIdentiques($demandes);

        $menu = $this->litJson('menuLabo');

        return view('labo.serieShow', [
          'menu' => $menu,
          'serie' => $serie,
          'titres' => $serieTableau['titres'],
          'valeurs' => $serieTableau['valeurs'],
          'nb_prelevements' => $serie->demandes[0]->prelevements->count(),
          'identique' => $identique,
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
