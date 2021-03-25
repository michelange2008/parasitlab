<?php

namespace App\Http\Controllers\Analyses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Analyses\Unite;

/**
 * Contrôleur de la classe Unite (unité de comptage d'un parasite)
 *
 * En théorie un contrôleur CRUD mais peu implémenté (TODO ?)
 * L'ajout d'une nouvelle unité se fait par le formulaire de modification d'un
 * Anaitem (parasite recherché).
 *
 * Seule la méthode store est implémentée et est appelée par une requête Ajax
 *
 * @package Analyses
 */
class UniteController extends Controller
{
    /**
     * Non implémentée: Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Non implémentée: Show the form for creating a new resource.
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
     * appelée par une requête Ajax de __anaitem.js__
     *
     * @param  \Illuminate\Http\Request  $request
     * @return file json Nouvelle unité
     */
    public function store(Request $request)
    {
        $datas = $request->all();

        $unite = new Unite();

        $unite->type = $datas['type_unite'];
        $unite->nom = $datas['nom_unite'];

        $unite->save();

        return json_encode($unite);
    }

    /**
     * Non implémentée: Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Non implémentée: Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Non implémentée: Update the specified resource in storage.
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
     * Non implémentée: Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
