<?php
namespace App\Http\Traits;

/**
 * Ajoute des euros au prix ht et des pourcentage à la tva
 */
trait FormatPrix
{
  function formatPrix($element)
  {
    if(isset($element->pu_ht)) {

      $element->pu_ht = $element->pu_ht." €";

    }

    if(isset($element->tva)) {

      $element->tva->taux = ($element->tva->taux * 100)."%";

    }

    return $element;
  }
}
