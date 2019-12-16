<?php
namespace App\Http\Traits;

use App\Models\Productions\Demande;

use App\Http\Traits\FormatDate;

/**
 * CALCUL D'INFOS SUR UNE DEMANDE: TOUS LES PRÉLÉVEMENTS NÉGATIFS,
 */
trait DemandeInfos
{

  use FormatDate;

  public function demandeInfos($demande)
  {
    $demandeInfos = collect();

    $demandeInfos->toutNegatif = $this->toutNegatif($demande);

    return $demandeInfos;
  }

  public function toutNegatif($demande)
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

  public function formatDateDemande($demande)
  {

    $demande->date_prelevement = $this->dateReadable($demande->date_prelevement);

    $demande->date_reception = $this->dateReadable($demande->date_reception);

    $demande->date_resultat = $this->dateReadable($demande->date_resultat);

    $demande->date_envoi = $this->dateReadable($demande->date_envoi);

  }

}
