<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Espece;
use App\Models\Icone;
use App\Models\Analyses\Analyse;
use App\Fournisseurs\ListeEspecesFournisseur;

use App\Http\Traits\LitJson;


class EspeceController extends Controller
{
    /**
     * Display a listing of les espèces (bovins, ovins, caprins, ...)
     *
     * @return \Illuminate\Http\Response
     */
    use LitJson;

    /**
     * Constructeur qui remplit la variable $menu avec le tableau issu du json
     */
    public function __construct()
    {
      $this->menu = $this->litJson('menuLabo');
    }

    public function index()
    {
        $especes = Espece::all();

        $fournisseur = new ListeEspecesFournisseur;

        $datas = $fournisseur->renvoieDatas($especes, __('titres.list_especes'), 'tout.svg', 'tableauEspeces', 'espece.create', __('boutons.add_espece'));

        return view('admin.espece.especeIndex', [
          'menu' => $this->menu,
          'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.espece.espece_create', [
        'menu' => $this->menu,
        'icones' => Icone::where('type', 'animaux')->get(),
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
      DB::table('especes')->insert([
        'nom' => $request->nom,
        'abbreviation' => $request->abbreviation,
        'icone_id' => $request->icone_id,
      ]);

      return redirect()->route('espece.index')->with('message', 'espece_add');
    }

    /**
     * Non utilisée car seulement edit
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
        return view('admin.espece.especeEdit', [
          'menu' => $this->menu,
          'espece' => Espece::find($id),
          'icones' => Icone::where('type', 'animaux')->get(),
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
        DB::table('especes')
          ->where('id', $id)
          ->update([
            'nom' => $request->nom,
            'abbreviation' => $request->abbreviation,
            'icone_id' => $request->icone_id,
          ]);

        return redirect()->route('espece.index')->with('message', 'espece_update');
    }

    /**
     * On ne peut supprimer une espèce que s'il n'y a pas d'analyse associée.
     * Sinon c'est interdit
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $has_analyse = Analyse::where('espece_id', $id)->count();
        if($has_analyse == 0) {
          Espece::destroy($id);
          return redirect()->back()->with('message', 'espece_del');
        }
        else {
          return redirect()->back()->with([
            'message' => 'espece_del_no',
            'couleur' => 'alert-danger',
          ]);
        }
    }
}
