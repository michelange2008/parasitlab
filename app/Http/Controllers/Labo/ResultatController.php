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
    * SAISIE DES RESULTATS
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

    public function store(Request $request)
    {

      $datas = $request->all();

      dd($datas);

      foreach ($datas as $intitule => $valeur) {

        $tableau_valeur = explode('_', $intitule);

        if (isset($tableau_valeur[0]) && $tableau_valeur[0] == "demande") {

          $demande_id = $valeur;

        }

        if (isset($tableau_valeur[0]) && $tableau_valeur[0] == "resultat") {

          if ($valeur === "presence" || intVal($valeur) > 0) {

            $resultat = new Resultat;

            $resultat->prelevement_id = $tableau_valeur[1];
            $resultat->anaitem_id = $tableau_valeur[2];
            $resultat->valeur = $valeur;

            $resultat->save();

          }

        }
      }


    }
}
