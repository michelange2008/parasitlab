<?php

namespace App\Http\Controllers\Labo;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Labo\CommentaireController;
use Illuminate\Http\Request;
use DB;

use App\Http\Traits\LitJson;
use App\Http\Traits\LitCsv;

use App\Models\Productions\Demande;
use App\Models\Productions\Prelevement;
use App\Models\Productions\Resultat;
use App\Models\Productions\Commentaire;

class ResultatController extends Controller
{
  use LitJson, LitCsv;

    protected $menu;

    public function __construct()
    {
      $this->menu = $this->litJson("menuLabo");

    }

    /*
    * SAISIE OU MODIFICATION DES RESULTATS
    */

    public function edit($demande_id)
    {

      $demande = Demande::find($demande_id);

      $commentaire = Commentaire::where('demande_id', $demande_id)->first();

      $prelevements = Prelevement::where('demande_id', $demande_id)->get();

      return view('labo.resultats.resultatsSaisie', [
        'menu' => $this->menu,
        'prelevements' => $prelevements,
        'demande' => $demande,
        'commentaire' => $commentaire,
      ]);
    }

    /*
    * STOCKAGE DES RESULTATS: issu du formulaire vue: resultatsSaisie.blade.php
    */

    public function store(Request $request)
    {

      $datas = $request->all();

      // ON RECUPERE L'ID DE LA DEMANDE POUR LA MARQUER ACHEVE OU NON
      if (isset($datas['demande_id'])) {

        $demande_id = $datas['demande_id'];

      }
      // SI IL Y A UN INDEX ACHEVE C'EST QUE LE SWITCH EST SUR ON - ON MET A JOUR LA DEMANDE
      if(isset($datas['acheve'])) {

        DB::table('demandes')->where('id', $demande_id)->update(['acheve' => true, 'date_resultat' => date("Y-m-d H:i:s")]);

      }
      // SINON C'EST QU'IL EST SUR OFF - ON MET A JOUR LA DEMANDE
      else {

        DB::table('demandes')->where('id', $demande_id)->update(['acheve' => false]);

      }

      // ON PASSE EN REVUE LA VARIABLE DATAS POUR EN EXTRAIRE TOUTES LES VALEURS SAISIES
      foreach ($datas as $intitule => $valeur) {
        // ON EXPLODE CAR LES VALEURS SONT SOUS LA FORME resultat_id du prélèvement__id_de l'anaitem (ex: resultat_2_4)
        $tableau_valeur = explode('_', $intitule);
        // ON CONTROLE QU'IL SAGIT BIEN D'UN RESULTAT
        if (isset($tableau_valeur[0]) && $tableau_valeur[0] == "resultat") {
          // ON ASSOCIE LES VALEURS AU prelevement_id ET anaitem_id
          $prelevement_id = $tableau_valeur[1];

          $anaitem_id = $tableau_valeur[2];

          // si cette valeur est supérieure à zéro ou vaut présence on la saisie dans le résultat (ou on la met à jour si elle existe)
          if ($valeur === "absence" || $valeur === null || $valeur === "-" || $valeur === "0") {

            Resultat::where('prelevement_id', $prelevement_id)->where('anaitem_id', $anaitem_id)->delete();

          }
          /* Comme c'est un formulaire pour saisir ET modifier, si une valeur est null ou égale à 0
          * il faut vérifier si elle n'existe pas déjà dans le tableau des résultats
          */
          else {

            $resultat = DB::table('resultats')->updateOrInsert(['prelevement_id' => $prelevement_id, 'anaitem_id' => $anaitem_id], ['valeur' => $valeur]);

          }

        }

      }
      // On stocke le commentaire dans la table correspondante
      if(isset($datas['commentaire'])) {

        $commentaire = new CommentaireController($demande_id);

        $commentaire->store($datas['commentaire']);

      }

      return redirect()->route('demandes.show', $demande_id);

    }
}
