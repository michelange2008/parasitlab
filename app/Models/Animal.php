<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Un animal est lié à un prélèvement pour une analyse
 *
 * Cet animal possède les attributs suivants: troupeau_id, numero et nom (nullable)
 *
 * @package Animaux
 */
class Animal extends Model
{
  /**
   * @var array vide car aucune attribut n'est interdit de 'mass-assignable'
   */
  protected $guarded = [];

  /**
  * @var boolean égale false car cela n'a pas de sens de mettre un timestamps
  */
  public $timestamps = false;

  /**
   * Troupeau auquel appartient l'animal (belongsTo)
   */
  public function troupeau()
  {
    return $this->belongsTo(Troupeau::class);
  }

  /**
   * Chaque animal est associé à 1 ou plusieurs prélèvements (hasMany)
   *
   * Un prélèvement provient forcément d'un animal
   *
   */
  public function prelevements()
  {
    return $this->hasMany(Productions\Prelevement::class);
  }

  /**
   * Un animal peut être dans plusieurs mélanges
   */
  public function melanges()
  {
    return $this->belongsToMany(Productions\Melange::class);
  }

}
