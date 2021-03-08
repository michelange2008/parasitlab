<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Catégories d'éléments de choix d'une analyse
 *
 * Dans l'algorithme de choix des analyses, les éléments pour ce choix sont
 * rangés dans trois catégories différentes:
 *  - observations: ce qu'on observe sur un animal ou un troupeau
 *  - actions: actions faites sur le troupau/animal: entrée en bâtiment, mise à l'herbe
 *  - situations: au sens géographiques --> zones humides, méditerranéenne, + saisies d'abattoir
 *
 * @package Algorithme
 */
class Categorie extends Model
{
  public $timestamps = false;

  public function observations()
  {
    return $this->hasMany(Observation::class);
  }

}
