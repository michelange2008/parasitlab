<?php

namespace App\Models\Algorithme;

use Illuminate\Database\Eloquent\Model;
/**
 * Définit les anatypes exclus par une association observation, age, espece age
 *
 * L'algorithme de choix des analyses fontionne par association d'Analyses
 * à certaines observations, espèces et ages. Mais il est aussi nécessaire de définir
 * des exclusions: c'est le rôle de ce modèle.
 * @package Algorithme
 */
class Exclusion extends Model
{
  public $timestamps = false;

  protected $fillable = ['espece_id', 'age_id', 'observation_id', 'anatype_id'];

  /**
   * une exclusion est associée à une observation (belongsTo)
   *
   * @return relation belongsTo
   */
  public function observation()
  {
    return $this->belongsTo(\App\Models\Algorithme\Observation::class);
  }

  /**
   * une exclusion est associée à un anatype (belongsTo)
   *
   * @return relation belongsTo
   */
  public function anatype()
  {
    return $this->belongsTo(\App\Models\Analyses\Anatype::class);
  }

  /**
   * une exclusion est associée à une espèce (belongsTo)
   *
   * @return relation belongsTo
   */
  public function espece()
  {
    return $this->belongsTo(\App\Models\Espece::class);
  }

  /**
   * une exclusion est associée à un age (belongsTo)
   *
   * Mais ça c'est facultatif car toutes les espèces n'ont pas des ages.
   * @return relation belongsTo
   */
  public function age()
  {
    return $this->belongsTo(\App\Models\Age::class);
  }

}
