<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;
use App\Fournisseurs\ListeTroupeausFournisseur;

use App\Models\Troupeau;
use App\Models\Eleveur;
use App\Models\Espece;
use App\Models\Typeprod;

use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;

/**
 * Contrôleur CRUD pour gérer le modèle Troupeau
 *
 * @package Animaux
 */
class TroupeauController extends Controller
{
    use LitJson, UserTypeOutil;

    protected $menu;

    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('labo');

      $this->menu = $this->litJson('menuLabo');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $troupeaus = Troupeau::orderBy('user_id')->get();

        $fournisseur = new ListeTroupeausFournisseur(); // voir class ListeFournisseur

        $datas = $fournisseur->renvoieDatas($troupeaus, __('titres.list_troupeau'), 'troupeau.svg', 'tableauTroupeaus', 'troupeau.create', __('boutons.add'));

        return view('admin.index.pageIndex', [
          "menu" => $this->menu,
          "datas" => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.troupeau.troupeauCreate', [
          'menu' => $this->menu,
          'eleveurs' => Eleveur::all(),
          'especes' => Espece::all(),
          'typeprods' => Typeprod::all(),

        ]);
    }

    /**
     * Fonction intermédiaire pour créer une variable de session quand on crée
     * un troupeau à partir d'une autre page (création d'animal par exemple)
     * @return [route] [troupeau.create]
     */
    public function createAvecAnimal()
    {
      session(["route" => "animal.create"]);

      return redirect()->action([TroupeauController::class, 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $troupeau = Troupeau::firstOrNew([
        'nom' => $request->nom,
        'user_id' => $request->user_id,
        'espece_id' => $request->espece_id,
        'typeprod_id' => $request->typeprod_id,
      ]);

      // $message = (empty($troupeau->id)) ? 'troupeau_add' : 'troupeau_exist';
      // $couleur = (empty($troupeau->id)) ? 'alert-success' : 'alert-warning';
      $flash = [
        'message' => (empty($troupeau->id)) ? 'troupeau_add' : 'troupeau_exist',
        'couleur' => (empty($troupeau->id)) ? 'alert-success' : 'alert-warning',
      ];

      $troupeau->save();

      if(session()->has('route')) {

        $route = session('route');

        session()->forget('route');

        return redirect()->route($route)->with($flash);

      }

      return redirect()->route('troupeau.index')->with($flash);
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.troupeau.troupeauShowEditAnimal', [
          'menu' => $this->menu,
          'troupeau' => Troupeau::find($id),
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
        return view('admin.troupeau.troupeauEdit', [
          'menu' => $this->menu,
          'troupeau' => Troupeau::find($id),
          'especes' => Espece::all(),
          'typeprods' => Typeprod::all(),
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
        $datas = $request->all();

        $troupeau = Troupeau::find($id);

        $troupeau->nom = $datas['nom'];

        $troupeau->espece_id = $datas['espece_id'];

        $troupeau->typeprod_id = $datas['typeprod_id'];

        $troupeau->save();

        return redirect()->route('troupeau.index')->with('message', 'troupeau_update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Troupeau::destroy($id);

        return redirect()->back()->with('message', 'troupeau_del');
    }
}
