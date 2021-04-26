<?php

namespace App\Http\Controllers\Labo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Animal;
use App\Models\Troupeau;
use App\Models\Productions\Melange;
use App\Models\Productions\Prelevement;

use App\Fournisseurs\ListeMelangesFournisseur;
use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;
/**
 * Gestion des mélanges
 *
 * Un mélange est un prélèvement issu de plusieurs animaux, identifiés ou non.
 * Si les animaux sont identifiés, il y a une table pivot qui enregistre le lien
 * entre mélange et animal
 *
 * @package Productions
 */
class MelangeController extends Controller
{
    use LitJson, UserTypeOutil;

    protected $menu;

    /**
     * Constructeur qui remplit la variable $menu avec le tableau issu du json
     */
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
      // On n'utiliser pas la modèle Melange mais le modèle Prelevement pour avoir toutes les infos associées
      $prelevements_melange = Prelevement::where('estMelange', true)->get();

      $fournisseur = new ListeMelangesFournisseur();

      $datas = $fournisseur->renvoieDatas($prelevements_melange, __('titres.list_melanges'), 'mela.svg', 'tableauMelanges', 'melange.create',  __('boutons.add_melange'));

      return view('labo.melange', [
        'menu' => $this->menu,
        'datas' => $datas,
      ]);
    }
    /**
     * Affiche un formulaire intermédiaire pour choisir l'éleveur et le troupeau
     * Ce formulaire renvoie ensuite àla fonction createAvecTroupeau
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eleveurs = $this->listeEleveurs(); // fonction issue du trait UserTypeOutil

        return view('labo.melanges.melangeCreateChoixTroupeau', [
          'menu' => $this->menu,
          'eleveurs' => $eleveurs,
        ]);
    }

    /**
    * Fonction destinée à créer un nouveau mélange une fois le troupeau choisi
    * vient après la précédent méthode
    */
    public function createAvecTroupeau(Request $request)
    {
      return view('labo.melanges.melangeCreate',[
        'menu' => $this->menu,
        'troupeau' => Troupeau::find($request->troupeau_id),
        'animals' => Animal::where('troupeau_id', $request->troupeau_id)->orderBy('numero')->get(),
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
        dd($request->all());
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
