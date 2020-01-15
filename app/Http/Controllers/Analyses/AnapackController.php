<?php

namespace App\Http\Controllers\Analyses;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fournisseurs\ListeAnapacksFournisseur;

use App\Models\Analyses\Anapack;
use App\Models\Productions\Demande;
use App\Models\Productions\Serie;

use App\Http\Traits\LitJson;
use App\Http\Traits\FormatDate;

class AnapackController extends Controller
{
    use LitJson, FormatDate;

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
      $anapacks = Anapack::all();

      $fournisseur = new ListeAnapacksFournisseur(); // voir class ListeFournisseur

      $datas = $fournisseur->renvoieDatas($anapacks, "Liste des packs d'analyse", "pack.svg", 'tableauAnapacks', 'anapacks.create', "Ajouter un nouvel pack");

      return view('admin.index.pageIndex', [
        'menu' => $this->menu,
        'datas' => $datas,
      ]);

    }

    /**
    * REQUETE AJAX DE CreateDemande.js **************************
    * METHODES POUR AIDER A LA SAISIE D'UNE NOUVELLE DEMANDE ET VERIFIANT SI CETTE DEMANDE RENVOIE A UNE serie
    * VOIRE UNE SERIE DEJA EXISTANTE
    * Méthode qui renvoie un json (liste) qui comprend:
    *  - Un booleen (estSerie) : true si l'anapack correspond à une serie, false dans le cas contraire
    *  - un tableau avec la liste des demandes qui correspondent au meme anapack et qui ne sont pas achevées
    *
    */
    public function estSerie($anapack_id, $user_id)
    {
      $anapack = Anapack::find($anapack_id); // On récupère l'anapack

      $liste["estSerie"] = $anapack->serie; // On ajoute le booleen qui dit si cet anapack correspond à une serie

      $listeDemandeSerieNonAcheve = []; // On crée le tableau dans lequel viendra les demandes de ce user, avec le
      // même anapack s'il correspond à une série et si la série n'est pas achevée.

      if($anapack->serie) { // Si cet anapack est bien une série
        // Requete pour récupérer les demandes d'analyse de cet éleveur, correspondant au même pack et dont la série n'est pas terminée
        $demandes = DB::table('demandes')
                      ->join('series', 'series.id', '=', 'demandes.serie_id')
                      ->where('demandes.user_id', $user_id) // On récupère les demandes correspondantes
                      ->where('demandes.anapack_id', $anapack_id)
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
