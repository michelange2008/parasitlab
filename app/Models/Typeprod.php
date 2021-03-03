<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Type de production: brebise laitières, vaches allaitantes, etc.
 *
 * Un typeprod appartient à une espèce et possède des troupeaus
 *
 * __Table typeprods:__
 * + idea
 * + nom (vachar)
 * + espece_id
 */
class Typeprod extends Model
{
  protected $guarded = [];
  public $timestamps = false;

  /**
   * Appartient à une espce
   * @return belongsTo
   */
  public function espece()
  {
    return $this->belongsTo(Espece::class);
  }

  /**
   * Possède des troupeaus
   * @return hasMany
   */
  public function troupeaus()
  {
    return $this->hasMany(Troupeau::class);
  }

}
