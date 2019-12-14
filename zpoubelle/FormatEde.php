<?php
namespace App\Http\Traits;

/**
 *
 */
trait FormatEde
{
  function edeAvecEspace($num)
  {
    $num = str_replace(" ", "", $num);

    if(preg_match("#^[0-9]{8}#", $num))
    {

      $num_formate = number_format($num, 0,',',' ');

      return $num_formate;

    }
    else
    {

      return $num;

    }

  }

  public function edeSansEspace($num)
  {

    if(preg_match("#^[0-9]{2}\s[0-9]{3}\s[0-9]{3}#", $num))

    return str_replace(" ", "", $num);

  }
}
