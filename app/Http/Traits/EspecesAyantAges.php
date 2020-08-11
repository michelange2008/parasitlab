<?php
namespace App\Http\Traits;

use DB;

/**
 * Renvoi une collection avec les id des espèces qui ont un age
 */
trait EspecesAyantAges
{
  function especesAyantAges()
  {
    $especes_avec_ages = DB::table('especes')->select('especes.id')->join('ages', 'ages.espece_id', '=', 'especes.id')->get();

    $liste_especes_avec_ages = Collect();

    foreach ($especes_avec_ages as $espece) {

      $liste_especes_avec_ages->push($espece->id);

    }
    // On élimine les doublons et on remet le tableau à l'endroit
    $especeAyantAges = $liste_especes_avec_ages->countBy()->keys();

    return $especeAyantAges;

  }

}
