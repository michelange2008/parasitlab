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
    $path = 'storage/img/icones';
    $files = scandir($path);
    $file_pattern = "/[a-zA-Z0-9]+\.[a-zA-Z0-9]{3}/";
    foreach ($files as $file) {
      if (preg_match($file_pattern, $file)) {
        Icone::firstOrCreate(
          ['nom' => $file],
          ['type' => 'divers']
        );
      }
    }

    $icones = Icone::all()->sortBy('type');
    $icones_groupe = $icones->groupBy('type');

    return view('admin.icones.iconesIndex', [
      'menu' => $this->menu,
      'icones_groupe' => $icones_groupe,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\View\View admin/icones/iconeCreate
   */
  public function create()
  {
    $types = Icone::select('type')->get()->groupBy('type')->keys();

    return view('admin.icones.iconeCreate', [
      'menu' => $this->menu,
      'types' => $types,
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

    $icone_nom = strtolower($request->nom) . '.' . $extension;

    $file->storeAs('img/icones', $icone_nom, 'public');

    $nouvelle_icone = new Icone;

    $nouvelle_icone->nom = $icone_nom;
    $nouvelle_icone->type = $request->type;

    $nouvelle_icone->save();

    return redirect()->route('icones.index')->with('message', 'icone_store');
  }

  /**
   * NON IMPLÉMENTÉ: Aucun intérêt
   *
   * @param  int  $id
   */
  public function show($id)
  {
    //
  }

  /**
   * NON IMPLÉMENTÉ: Car il ne faut pas pouvoir modifier des icones utilisées par le programme
   *
   * @param  int  $id
   */
  public function edit(Icone $icone)
  {
  }

  /**
   * NON IMPLÉMENTÉ: Car il ne faut pas pouvoir modifier des icones utilisées par le programme
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   */
  public function update(Request $request, Icone $icone)
  {
  }

  /**
   * NON IMPLÉMENTÉ: Car il ne faut pas pouvoir modifier des icones utilisées par le programme
   *
   * @return \Illuminate\View\View admin/icones/iconeSuppr
   */
  public function suppr()
  {
  }

  /**
   * NON IMPLÉMENTÉ: Car il ne faut pas pouvoir modifier des icones utilisées par le programme
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response redirect vers index()
   */
  public function destroy($id)
  {
  }

  /**
   * Function pour la requête ajax pour vérifier que l'on ne crée pas de doublon
   *
   * @see App\resources\js\inputImage
   *
   * @return json
   */
  public function liste()
  {
    $icones = Icone::select('nom')->get();

    $nom_icones = $icones->map(function ($item, $key) {
      return $item->nom;
    });

    return json_encode($nom_icones);
  }
}
