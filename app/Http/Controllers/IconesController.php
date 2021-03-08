<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Icone;

use App\Http\Traits\LitJson;
use App\Http\Traits\ImagesManager;

class IconesController extends Controller
{
    use LitJson, ImagesManager;

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
        return view('admin.icones.iconesIndex', [
          'menu' => $this->menu,
          'icones' => Icone::all()->sortBy('nom'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $icones = Icone::all();

        // $datas = $request->validate([
        //   'nom' => 'required|alphanum|max:191',
        // ]);
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
     * affiche la liste des icone pour suppression en cliquant dessus
     *
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $icone_avec_chemin = 'storage/img/icones/'.Icone::find($id)->nom;

        $this->supprImage($icone_avec_chemin);

        Icone::destroy($id);

        return redirect()->route('icones.index')->with('message', 'icone_del');
    }

    // Function pour la requete ajax pour vérifier que l'on ne crée pas de doublon
    public function liste()
    {
      $icones = Icone::select('nom')->get();

      $nom_icones = $icones->map(function($item, $key) {
        return $item->nom;
      });

      return json_encode($nom_icones);
    }
}
