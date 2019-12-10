<?php

namespace App\Http\Controllers\Labo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productions\Demande;
use App\Models\Productions\Serie;
use App\Http\Traits\LitJson;
use App\Http\Traits\SerieInfos;
use App\Http\Traits\EleveurInfos;

class SerieController extends Controller
{

    use LitJson, SerieInfos, EleveurInfos;
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

        $user = $serie->demandes[0]->user;

        $user = $this->eleveurUser($user);

        $eleveurInfos = $this->eleveurInfos($user);

        $serieInfos = $this->serieInfos($serie);

        $menu = $this->litJson('menuLabo');

        return view('labo.show', [
          'menu' => $menu,
          'user' => $user,
          'eleveurInfos' => $eleveurInfos,
          'serie' => $serie,
          'serieInfos' => $serieInfos,
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
