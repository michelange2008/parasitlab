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
    $dateSortable = (new Carbon($date))->format('Y/m/d');

    return $dateSortable;
  }
}
