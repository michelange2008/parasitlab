<?php
namespace App\Http\Traits;

/**
 *
 */
trait FormatEde
{
  function edeAvecEspace($ede)
  {
    $ede = str_replace(" ", "", $ede);
    if(preg_match("#^[0-9]{8}#", $ede)) {
      $cars = preg_split('//', $ede, -1, PREG_SPLIT_NO_EMPTY);
      $ede_formate = $cars[0].$cars[1]." ".$cars[2].$cars[3].$cars[4]." ".$cars[5].$cars[6].$cars[7];
      return $ede_formate;
    }
    else {
      return $ede;
    }
  }

  public function edeSansEspace($ede)
  {
    if(preg_match("#^[0-9]{2}\s[0-9]{3}\s[0-9]{3}#", $ede))
    return str_replace(" ", "", $ede);
  }
}
