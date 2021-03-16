<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

/**
 * Controleur qui gère l'objet Animal
 *
 * @see \App\Models\Animal
 *
 * @package Animaux
 */
class AnimalController extends Controller
{
    /**
     * NON IMPLEMENTE: affiche la liste des animaux
     *
     * Sans objet car, pour l'instant les animaux ont comme seule utilité de
     * renseigner le prélèvement
     */
    public function index()
    {
        //
    }

    /**
     * NON IMPLEMENTE: renvoie le formulaire pour créer un animal
     *
     * En fait cette fonction n'est pas implémenté car c'est pas la saisie d'un
     * prélèvement que l'on crée un nouvel animal.
     */
    public function create()
    {
        //
    }

    /**
     * Enregistre le nouvel animal créé
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all();

        $animal = new Animal;

        $animal->numero = $datas['numero'];

        $animal->nom = $datas['nom'];

        $animal->troupeau_id = $datas['troupeau_id'];

        $animal->save();

        return redirect()->back()->with('message', 'animal_add');




    }

    /**
     * NON IMPLEMENTE: affiche l'animal
     *
     * @param  int  $id
     */
    public function show($id)
    {
        //
    }

    /**
     * NON IMPLEMENTE: renvoie un formulaire pour modifier un animal
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Met à jour un animal modifié
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id id de l'animal à mettre à jour
     */
    public function update(Request $request, $id)
    {
        $datas = $request->all();

        $animal = Animal::find($id);

        $animal->numero = $datas['numero'];

        $animal->nom = $datas['nom'];

        $animal->save();

        return redirect()->back()->with('message', 'animal_update');

    }

    /**
     * Destiné à mettre à supprimer un animal
     *
     * @param  int  $id id de l'animal à détruire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Animal::destroy($id);

        return redirect()->back()->with('message', 'animal_del');
    }
}
