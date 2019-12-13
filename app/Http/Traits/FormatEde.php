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

    if(preg_match("#^[0-9]{8}#", $ede))
    {

      $ede_formate = number_format($ede, 0,',',' ');

      return $ede_formate;

    }
    else
    {

      return $ede;

    }

  }

  public function edeSansEspace($ede)
  {

    if(preg_match("#^[0-9]{2}\s[0-9]{3}\s[0-9]{3}#", $ede))

    return str_replace(" ", "", $ede);

  }
}
