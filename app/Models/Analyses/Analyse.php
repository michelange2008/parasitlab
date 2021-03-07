<?php

namespace App\Models\Analyses;

use Illuminate\Database\Eloquent\Model;

/**
 * C'est l'association d'une analyse et d'une espèce.
 *
 * _Exemple:_ "strongles gastrointestinaux (ovins)"
 *
 * On peut se demander à quoi sert cette classe. Pourquoi ne pas avoir fait une
 * table pivot avec anaacte/espece, ou anatype/espece
 *
 * __Table__:
 * + id
 * + nom: varchar(191)
 * + anatype_id
 * + espece_id
 * + icone_id
 *
 * @see Anatype
 * @see \App\Models\Espece
 * @see \App\Models\Icone
 * @package Analyses
 */
class Analyse extends Model
{
  /**
   * La notion de timesamps n'a pas de sens car c'est défini une fois pour toute
   * @var boolean
   */
    public $timestamps = false;

    /**
     * Toute analyse appartient à une espèce et une seule
     * @return belongsTo
     */
    public function espece()
    {
      return $this->belongsTo(\App\Models\Espece::class);
    }

    /**
     * Toute analyse une icone (qui peut être partagée avec d'autres classes)
     * @return belongsTo
     */
    public function icone()
    {
      return $this->belongsTo(\App\Models\Icone::class);
    }

    /**
     * A chaque prélèvement est associé une analyse
     * @return hasMany
     */
    public function prelevements()
    {
      return $this->hasMany(\App\Models\Productions\Prelevement::class);
    }

    /**
     * Toute analyse appartient à un anatype
     * @return belongsTo
     */
    public function anatype()
    {
      return $this->belongsTo(Anatype::class);
    }

    /**
     * Une analyse peut être associée à plusieurs anaitems et vice-Traversable
     *
     * C'est à dire strongles gastrointestinaux (ovins) est associé à nematodirus, trichuris, etc.
     *
     * Et nematodirus (qui est un anaitem) va être associé à différentes Analyses
     *
     * Il y a donc une table pivot correspondante.
     * @return belongsToMany
     */
    public function anaitems()
    {
      return $this->belongsToMany(Anaitem::class);
    }

}
