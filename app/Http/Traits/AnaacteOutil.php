<?php
namespace App\Http\Traits;

/**
 *
 */
trait AnaacteOutil
{
  // Ajoute des euros au prix ht et des pourcentage à la tva
  function formatPrix($anaacte)
  {
    if(isset($anaacte->pu_ht)) {

      $anaacte->pu_ht = $anaacte->pu_ht." €";

    }

    if(isset($anaacte->tva)) {

      $anaacte->tva->taux = ($anaacte->tva->taux * 100)."%";

    }

    return $anaacte;
  }

  // A partir d'un anaacte, renvoie l'anatype6>nom et l'anaacte->nom en plus petit
  public function formatAnaacteAnaType($anaacte)
  {
    return $anaacte->anatype->abbreviation."</br><span class='small'>(".$anaacte->abbreviation.")</span>";
  }

}
