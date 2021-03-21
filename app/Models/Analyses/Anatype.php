<?php

namespace App\Models\Analyses;

use Illuminate\Database\Eloquent\Model;

/**
 * C'est l'analyse demandée par le client
 *
 * Exemple: Strongles gastro-intestinaux, Grande douve et paramphistome, ...
 *
 * Il s'agit d'une analyse caractérisée par son nom et sa technique.
 *
 * Tout Anaacte et Analyse est relié à un Anatype.
 *
 * Anatype est relié à Espece et Age par des table pivot: un Anatype peut correspondre
 * à différentes Espece ou Age et vice-versa
 *
 * __Table anatypes__
 * + _id_
 * + _abbreviation_: vachar(50)
 * + _nom__: vachar(191)
 * + _technique_: varchar(191) Décrit la technique d'analyse
 * + _remarque_: mediumtext AJoute éventuellement des informations
 * + _estAnalyse_: booléen Pour différencier ce qui n'est pas une analyse (ex. Kit)
 * + _iconeid_
 *
 * @package Analyses
 */
class Anatype extends Model
{
    /**
     * Pas de timestamps car défini a priori
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Plusieurs anaactes ont un même anatype
     * @return hasMany
     */
    public function anaactes()
    {
      return $this->hasMany(Anaacte::class);
    }

    /**
     * Plusieurs analyses ont un même anatype
     * @return hasMany
     */
    public function analyses()
    {
      return $this->hasMany(Analyse::class);
    }

    /**
     * Les anatypes concernent plusieurs espèces qui peuvent correspondre à différents anatypes
     * @return belongsToMany
     */
    public function especes()
    {
      return $this->belongsToMany(\App\Models\Espece::class);
    }

    /**
     * Les anatypes concernent plusieurs ages qui peuvent correspondre à différents anatypes
     * @return belongsToMany
     */
    public function ages()
    {
      return $this->belongsToMany(\App\Models\Age::class);
    }

    /**
     * Les anatypes concernent plusieurs observations qui peuvent correspondre à différents anatypes
     * @return belongsToMany
     */
    public function observations()
    {
      return $this->belongsToMany(\App\Models\Algorithme\Observation::class);
    }

    /**
     * Les anatypes concernent plusieurs options qui peuvent correspondre à différents anatypes
     * @return belongsToMany
     */
    public function options()
    {
      return $this->belongsToMany(\App\Models\Option::class);
    }

    /**
     * Une exclusion est définie par l'anatype auquel elle s'applique
     * @see \App\Models\Algorithme\Exclusion
     * @return hasOne
     */
    public function exclusion()
    {
      return $this->hasOne(\App\Models\Algorithme\Exclusion::class);
    }

    /**
     * Tout anatype est caractérisé par une icone qui ne lui est pas exclusive
     * @return belongsTo
     */
    public function icone()
    {
      return $this->belongsTo(\App\Models\Icone::class);
    }
}
