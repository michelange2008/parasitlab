<?php
namespace App\Http\Traits;

/**
 * AJOUTE AU ENLEVE DES ESPACES AUX NUMERO DE CRO DES VETÉRINAIRES
 */
trait FormatCro
{
  function croAvecEspace($cro)
  {
    $cro = str_replace(" ", "", $cro);


    if(preg_match("#^[0-9]#", $cro))
    {

      $cro_formate = number_format(intval($cro), 0, ',', ' ');

      return $cro_formate;

    }

    else
    {

      return $cro;

    }

  }

}
