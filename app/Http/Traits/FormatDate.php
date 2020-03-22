<?php
namespace App\Http\Traits;

use Carbon\Carbon;

/**
 * FOURNIT DIFFERENTES METHODE DE FORMATAGE DE DATE
 */
trait FormatDate
{
  function dateSortable($date)
  {

    return ($date == null ) ? " - " : (new Carbon($date))->format('Y/m/d');

  }

  public function dateReadable($date)
  {

    return ($date == null) ? null : (new Carbon($date))->format('d M Y');

  }

  public function dateLisible($date)
  {

    $dateLisible = (new Carbon($date))->format('d M Y');

    return $dateLisible;
  }

}
