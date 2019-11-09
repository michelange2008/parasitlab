<?php

namespace App\Http\Controllers\Labo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\LitJson;
use App\User;
use App\Models\Eleveur;
use App\Models\Espece;
use App\Models\Analyses\Anapack;
use App\Models\Veto;
use App\Models\Productions\Demande;

class DemandeController extends Controller
{
    use LitJson;

    protected $menu;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->menu = $this->litJson("menuLabo");
    }

    public function index()
    {
        return view('labo.demandeIndex');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $demande = new Demande();
        $listeEleveurs = Eleveur::all();
        $listeEspeces = Espece::all();
        $listeAnapacks = Anapack::all();
        $listeVetos = Veto::all();

        return view('labo.demandeCreate', [
          'menu' => $this->menu,
          'demande' => $demande,
          'listeEleveurs' => $listeEleveurs,
          'listeEspeces' => $listeEspeces,
          'listeAnapacks' => $listeAnapacks,
          'listeVetos' => $listeVetos,
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
