<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

/**
 * Etat d'un prélèvement à l'arrivée au labo
 *
 * Pour l'instant il y a 3 états possibles: bon, mauvais, non utilisable
 *
 * __Table__:
 *  + _id_: int(10) UNSIGNED NOT NULL,
  * + _nom_: varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
  *
  * @package Productions
 */
class Etat extends Model
{
  public $timestamps = false;

    /**
     * Tout prélèvement a un état (bon, par défaut)
     * @return hasMany
     */
    public function Prelevements()
    {
      return $this->hasMany(Prelevement::class);
    }
}
