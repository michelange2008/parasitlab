<?php

namespace App\Http\Controllers\Analyses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Fournisseurs\ListeAnaactesFournisseur;

use App\Models\Analyses\Anaacte;

use App\Http\Traits\LitJson;
use App\Http\Traits\AnaacteOutil;

class AnaacteController extends Controller
{
    use LitJson, AnaacteOutil;

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
      $anaactes = Anaacte::where('estAnalyse', true)->orderBy('anatype_id', 'asc')->get();

      foreach ($anaactes as $anaacte) {

        $anaacte = $this->formatPrix($anaacte);

      }


      $fournisseur = new ListeAnaactesFournisseur(); // voir class ListeFournisseur

      $datas = $fournisseur->renvoieDatas($anaactes, "Liste des analyses proposées", "acte.svg", 'tableauAnaactes', 'anaactes.create', "Ajouter un nouvel acte");

      return view('admin.index.pageIndex', [
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
      return view('errors.entravaux');

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
      return view('errors.entravaux');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('errors.entravaux');

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

    /**
    * Methode pour afficher les types (en attendant de faire peut-être un controller)
    */
    public function indexTypes()
    {
    }
    /**
    * REQUETE AJAX DE CreateDemande.js **************************
    * METHODES POUR AIDER A LA SAISIE D'UNE NOUVELLE DEMANDE ET VERIFIANT SI CETTE DEMANDE RENVOIE A UNE serie
    * VOIRE UNE SERIE DEJA EXISTANTE
    * Méthode qui renvoie un json (liste) qui comprend:
    *  - Un booleen (estSerie) : true si l'anaacte correspond à une serie, false dans le cas contraire
    *  - un tableau avec la liste des demandes qui correspondent au meme anaacte et qui ne sont pas achevées
    *
    */
    public function estSerie($anaacte_id, $user_id)
    {
      $anaacte = Anaacte::find($anaacte_id); // On récupère l'anaacte

      $liste["estSerie"] = $anaacte->estSerie; // On ajoute le booleen qui dit si cet anaacte correspond à une serie

      $listeDemandeSerieNonAcheve = []; // On crée le tableau dans lequel viendra les demandes de ce user, avec le
      // même anaacte s'il correspond à une série et si la série n'est pas achevée.

      if($anaacte->estSerie) { // Si cet anaacte est bien une série
        // Requete pour récupérer les demandes d'analyse de cet éleveur, correspondant au même acte et dont la série n'est pas terminée
        $demandes = DB::table('demandes')
                      ->join('series', 'series.id', '=', 'demandes.serie_id')
                      ->where('demandes.user_id', $user_id) // On récupère les demandes correspondantes
                      ->where('demandes.anaacte_id', $anaacte_id)
                      ->where('series.acheve', '=', false)
                      ->get();
        $liste['nbDemandes'] = $demandes->count();

        $i = 0;

        foreach ($demandes as $demande) {

          $demande->date_reception = $this->dateReadable($demande->date_reception);

          $liste[$i] =$demande;

          $i++;

        }

    }
    // On renvoie ce json pour affichage éventuel des lignes
      return json_encode($liste);
    }

}
