<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Fournisseurs\ListeTroupeausFournisseur;

use App\Models\Troupeau;
use App\Http\Traits\LitJson;


class TroupeauController extends Controller
{
    use LitJson;

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
        return view('admin.troupeau.troupeauShow', [
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
