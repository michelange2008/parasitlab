<?php

namespace App\Http\Controllers\Labo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Traits\LitJson;

use App\Models\Productions\Demande;
use App\Models\Productions\Prelevement;
use App\Models\Productions\Resultat;

class ResultatController extends Controller
{
  use LitJson;

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

      $prelevements = Prelevement::where('demande_id', $demande_id)->get();

      return view('labo.resultats.resultatsSaisie', [
        'menu' => $this->menu,
        'prelevements' => $prelevements,
      ]);
    }

    /*
    * STOCKAGE DES RESULTATS
    */

    public function store(Request $request)
    {

      $datas = $request->all();

      foreach ($datas as $intitule => $valeur) {

        $tableau_valeur = explode('_', $intitule);

        if (isset($tableau_valeur[0]) && $tableau_valeur[0] == "demande") {

          $demande_id = $valeur;

        }

        if (isset($tableau_valeur[0]) && $tableau_valeur[0] == "resultat") {

          $prelevement_id = $tableau_valeur[1];

          $anaitem_id = $tableau_valeur[2];

          if ($valeur === "presence" || intVal($valeur) > 0) {

            $resultat = new Resultat;

            $resultat->prelevement_id = $prelevement_id;
            $resultat->anaitem_id = $anaitem_id;
            $resultat->valeur = $valeur;

            $resultat->save();

          }
          /* Comme c'est un formulaire pour saisir ET modifier, si une valeur est null ou égale à 0
          * il faut vérifier si elle n'existe pas déjà dans le tableau des résultats
          */
          else {

            Resultat::where('prelevement_id', $prelevement_id)->where('anaitem_id', $anaitem_id)->delete();

          }

        }

      }

      return redirect()->route('demandes.show', $demande_id);

    }
}
