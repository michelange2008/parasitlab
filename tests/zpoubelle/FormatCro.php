<?php
namespace App\Http\Traits;

/**
 * AJOUTE AU ENLEVE DES ESPACES AUX NUMERO DE CRO DES VETÉRINAIRES
 */
trait FormatCro
{
  function croAvecEspace($num)
  {
    $num = str_replace(" ", "", $num);


    if(preg_match("#^[0-9]#", $num))
    {

      $num_formate = number_format(intval($num), 0, ',', ' ');

      return $num_formate;

    }

    else
    {

      return $num;

    }

  }

}
