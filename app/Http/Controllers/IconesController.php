<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Icone;

use App\Http\Traits\LitJson;
use App\Http\Traits\ImagesManager;

/**
 * Gère les icones utilisées dans le site
 *
 * Permet d'ajouter et supprimer des icones disponibles
 *
 * @see \App\Http\Traits\ImagesManager
 * @package Interne
 */
class IconesController extends Controller
{
    use LitJson, ImagesManager;

    /**
     * Données pour l'affichage du menu
     * @var array
     */
    protected $menu;

    /**
     * Peuple la variable menu avec les infos de menuLabo.json et le Trait LitJson
     */
    public function __construct()
    {
      $this->menu = $this->litJson('menuLabo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View admin/icones/iconesIndex
     */
    public function index()
    {
        return view('admin.icones.iconesIndex', [
          'menu' => $this->menu,
          'icones' => Icone::all()->sortBy('nom'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View admin/icones/iconeCreate
     */
    public function create()
    {
        return view('admin.icones.iconeCreate', [
          'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response redirect vers la methode index()
     */
    public function store(Request $request)
    {
        $icones = Icone::all();

        $file = $request->file('icone_nouvelle');

        $extension = $file->extension();

        $icone_nom = strtolower($request->nom).'.'.$extension;

        $file->storeAs('img/icones', $icone_nom, 'public');

        $nouvelle_icone = new Icone;

        $nouvelle_icone->nom = $icone_nom;

        $nouvelle_icone->save();

        return redirect()->route('icones.index')->with('message', 'icone_store');

    }

    /**
     * NON INMPLEMENTE: Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        //
    }

    /**
     * NON IMPLEMENTE: Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        //
    }

    /**
     * NON IMPLEMENTE: Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * affiche la liste des icone pour suppression en cliquant dessus
     *
     * @return \Illuminate\View\View admin/icones/iconeSuppr
     */
    public function suppr()
    {

      return view('admin.icones.iconesSuppr', [
        'menu' => $this->menu,
        'icones' => Icone::all()->sortBy('nom'),
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response redirect vers index()
     */
    public function destroy($id)
    {
        $icone_avec_chemin = 'storage/img/icones/'.Icone::find($id)->nom;

        $this->supprImage($icone_avec_chemin);

        Icone::destroy($id);

        return redirect()->route('icones.index')->with('message', 'icone_del');
    }

    /**
     * Function pour la requete ajax pour vérifier que l'on ne crée pas de doublon
     *
     * @see App\resources\js\inputImage
     *
     * @return json
     */
    public function liste()
    {
      $icones = Icone::select('nom')->get();

      $nom_icones = $icones->map(function($item, $key) {
        return $item->nom;
      });

      return json_encode($nom_icones);
    }
}
