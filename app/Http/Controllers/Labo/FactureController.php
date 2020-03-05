<?php

namespace App\Http\Controllers\Labo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\User;
use App\Models\Veto;
use App\Models\Productions\Facture;
use App\Models\Productions\Demande;
use App\Models\Productions\Acte;

use App\Fournisseurs\ListeFacturesFournisseur;

use App\Http\Traits\LitJson;
use App\Http\Traits\DemandeFactory;
use App\Http\Traits\ClientsAFacturer;

class FactureController extends Controller
{

    use LitJson, DemandeFactory, ClientsAFacturer;

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
      $factures = Facture::all();

      $fournisseur = new ListeFacturesFournisseur();

      $datas = $fournisseur->renvoieDatas($factures, "Liste des factures", "factures.svg", 'tableauFactures', 'factures.create', 'Etablir une facture');

      return view('labo.factures', [
        'menu' => $this->menu,
        'datas' => $datas,
      ]);
    }

    /**
    * Fonction pour créer une facture avec un destinataire dejà connu
    */
    public function postCreate($user_id)
    {
      $user = User::find($user_id);

      $demandes = Demande::where('user_id', $user_id)
                    ->where('facturee', false)
                    ->get();

      $demandes = $this->formatDateDemandes($demandes);

      return view('labo.factureCreate', [
        'menu' => $this->menu,
        'user' => $user,
        'demandes' => $demandes,
      ]);
    }
    /**
     * Premier phase de l'établisement d'une facture avec le choix du client
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // liste des utilisateurs qui ont des actes à facturer avec l'id de l'acte
        $users_anf =$this->clientsActesAFacturer();
        //liste des utilisateurs qui ont des demandes à facturer avec l'il de la demande
        $users_dnf = $this->clientsDemandesAFacturer();
        //liste des id des utilisateurs à facturer.
        $users_a_facturer = $users_anf->keys()->merge($users_dnf->keys())->unique();

        $users = User::find($users_a_facturer);

        return view('labo.factureCreate', [
          'menu' => $this->menu,
          'users' => $users,
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
