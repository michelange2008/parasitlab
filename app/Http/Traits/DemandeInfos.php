<?php
namespace App\Http\Traits;

use App\Models\Productions\Demande;

/**
 * CALCUL D'INFOS SUR UNE DEMANDE: TOUS LES PRÉLÉVEMENTS NÉGATIFS,
 */
trait DemandeInfos
{

public function demandeInfos($demande)
  {
    $demandeInfos = collect();

    $demandeInfos->toutNegatif = $this->toutNegatif($demande);

    return $demandeInfos;
  }

  function toutNegatif($demande)
  {
    $toutNegatif = true;

    foreach ($demande->prelevements as $prelevement) {

      foreach ($prelevement->resultats as $resultat) {

        if($resultat->positif) {

          $toutNegatif = false;

        }

      }

    }

    return $toutNegatif;

  }
}
