<?php
namespace App\Http\Traits;

/**
 * AJOUTE AU ENLEVE DES ESPACES AUX NUMERO DE CRO DES VETÉRINAIRES
 */
trait FormatNum
{
  function numAvecEspace($num)
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

  function telAvecEspace($tel)
  {
    if(preg_match("#^[0-9]{10}#", $tel)) {

      $cars = preg_split('//', $tel, -1, PREG_SPLIT_NO_EMPTY);

      $tel_format = $cars[0].$cars[1]." ".$cars[2].$cars[3]." ".$cars[4].$cars[5]." ".$cars[6].$cars[7]." ".$cars[8].$cars[9];

      return $tel_format;

    }

    else {

      return $tel;

    }
  }

}
