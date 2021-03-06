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


    public function anaactes()
    {
      return $this->hasMany(Anaacte::class);
    }

    public function analyses()
    {
      return $this->hasMany(Analyse::class);
    }

    public function especes()
    {
      return $this->belongsToMany(\App\Models\Espece::class);
    }

    public function ages()
    {
      return $this->belongsToMany(\App\Models\Age::class);
    }

    public function observations()
    {
      return $this->belongsToMany(\App\Models\Observation::class);
    }

    public function options()
    {
      return $this->belongsToMany(\App\Models\Option::class);
    }

    public function exclusion()
    {
      return $this->hasOne(\App\Models\Exclusion::class);
    }

    public function icone()
    {
      return $this->belongsTo(\App\Models\Icone::class);
    }
}
