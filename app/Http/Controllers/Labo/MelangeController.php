<?php

namespace App\Http\Controllers\Labo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Animal;
use App\Models\Troupeau;
use App\Models\Productions\Melange;
use App\Models\Productions\Prelevement;

use App\Fournisseurs\ListeMelangesFournisseur;
use App\Fournisseurs\ListePrelevementsMelangesFournisseur;
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

      $melanges = Melange::all();

      $fournisseur = new ListeMelangesFournisseur();

      $datas = $fournisseur->renvoieDatas($melanges, __('titres.list_melanges'), 'mela.svg', 'tableauMelanges', 'melange.choix_troupeau',  __('boutons.add_melange'));

      return view('labo.melange', [
        'menu' => $this->menu,
        'datas' => $datas,
      ]);
    }

    /**
     * Lors de la création d'un nouveau mélange, cette méthode
     * affiche un formulaire intermédiaire pour choisir l'éleveur et le troupeau
     * Ce formulaire renvoie ensuite àla fonction createAvecTroupeau
     *
     * @return \Illuminate\Http\Response
     */
    public function choix_troupeau()
    {
        $eleveurs = $this->listeEleveurs(); // fonction issue du trait UserTypeOutil

        return view('labo.melanges.choix_troupeau', [
          'menu' => $this->menu,
          'eleveurs' => $eleveurs,
        ]);
    }

    /**
    * Fonction destinée à créer un nouveau mélange une fois le troupeau choisi
    * vient après la précédent méthode
    * Mais peut être appelée par une autre voie.
    */
    public function createAvecTroupeau($troupeau_id)
    {

      return view('labo.melanges.melangeCreate',[
        'menu' => $this->menu,
        'troupeau' => Troupeau::find($troupeau_id),
        'animals' => Animal::where('troupeau_id', $troupeau_id)->orderBy('numero')->get(),
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

        $melange = new Melange();
        $melange->nom = $request->nom_melange;
        $melange->troupeau_id = $request->troupeau_id;
        // S'il n'y au moins un animal dans le mélange, on passe le booléen animaux à true
        if ($request->choix !== null) {

          $melange->animaux = true;

        }

        $melange->save();
        $melange->animals()->attach($request->choix);

        return redirect()->route('melange.index')->with('message', 'melange_add');

    }

    /**
     * Un seul affichage show et edit
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return route('melange.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $melange = Melange::find($id);

        return view('labo.melanges.melangeEdit', [
          'menu' => $this->menu,
          'melange' => $melange,
          'troupeau' => Troupeau::find($melange->troupeau_id),
          'animals' => Animal::where('troupeau_id', $melange->troupeau_id)->orderBy('numero')->get()
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
        $melange = Melange::find($id);

        $melange->animals()->detach();
        $melange->animals()->attach($request->choix);

        // Mise à jour de l'état du mélange: avec ou sans animaux
        $melange->animaux = ($request->choix == null) ? 0 : 1;
        $melange->save();

        return redirect()->route('melange.index')->with('message', 'melange_updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Melange::destroy($id);

        return redirect()->back()->with('message', 'melange_destroy');
    }
}
