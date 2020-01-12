<?php
namespace App\Http\Traits;

use App\Models\Analyses\Anaitem;
use App\Models\Analyses\Analyse;

/**
 * Retourne un tableau avec la liste des parasites correspondant à l'analyse d'un prélèvement
 */
trait ListeNomParasites
{
  function listeNomParasites($prelevement)
  {
    $listeNomParasites = [];

    foreach ($prelevement->analyse->anaitems as $anaitem) {

      $listeNomParasites[] = $anaitem->nom;

    }

    return $listeNomParasites;
  }
}
