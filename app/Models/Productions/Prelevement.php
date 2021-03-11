<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

/**
 * Il s'agit d'un prélèvement unitaire, généralement de fécès.
 *
 * Un prélèvement peut être issu d'une seul animal ou être un prélèvement de mélange.
 * C'est l'unité d'analyse.
 *
 * Un prélèvement est forcément associé à une Demande, à une Analyse et à un Animal.
 * En outre, ce peut être un prélèvement de mélange ou non, il est défini par un Etat,
 * et une appréciation par le demandeur.
 *
 * __Table__:
 * + _id_ int(10) UNSIGNED NOT NULL,
 * + _identification_ varchar(191) DEFAULT NULL, nom que le demandeur a donné à ce prélèvement
 * + _animal_id_ int(10) UNSIGNED DEFAULT NULL, en cas de prélèvement individuel, il peut y avoir l'animal_id
 * + _estMelange_ tinyint(1) NOT NULL DEFAULT 1, vrai si c'est un mélange
 * + _demande_id_ int(10) UNSIGNED NOT NULL,
 * + _analyse_id_ int(10) UNSIGNED NOT NULL,
 * + _etat_id_ int(10) UNSIGNED DEFAULT 1,
 * + _parasite_ tinyint(1) DEFAULT NULL, vrai si le demandeur pense que l'animal est parasité, null s'il ne sait pas
 * et faux s'il pense qu'il n'est pas parasité
 * + _created_at_ timestamp NULL DEFAULT NULL,
 * + _updated_at_ timestamp NULL DEFAULT NULL
 *
 * @package Productions
 */
class Prelevement extends Model
{

    public function demande()
    {
      return $this->belongsTo(Demande::class);
    }

    public function analyse()
    {
      return $this->belongsTo(\App\Models\Analyses\Analyse::class);
    }

    public function resultats()
    {
      return $this->hasMany(Resultat::class);
    }

    public function etat()
    {
      return $this->belongsTo(Etat::class);
    }

    public function signes()
    {
      return $this->belongsToMany(Signe::class);
    }

    public function animal()
    {
      return $this->belongsTo(\App\Models\Animal::class);
    }
}
