<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Age des animaux dont on fait les analyses
 *
 * Il s'agit d'un age par classe d'age: jeune, adulte. C'est valable surtout
 * pour les bovins et pour le choix d'une analyse par l'algorithme
 *
 * @package Animaux
 */
class Age extends Model
{
    /**
     * Pas d'enregistrement des dates pour ce modèle
     *
     * ça n'a aucun sens en soi puisqu'il s'agit de catégories définit à l'avance
     *
     * @param type timestamp
     * @return return booleen : false
     */
    public $timestamps = false;

    /**
     * Chaque age est associé à une icone (belongsTo)
     *
     */
    public function icone()
    {
      return $this->belongsTo(Icone::class);
    }

    /**
    * Chaque age est toujours relé à une espece (belongsTo)
    */
    public function espece()
    {
      return $this->belongsTo(Espece::class);
    }

    /**
    * Chaque age est associé potentiellement à plusieurs observations (belongsToMany)
    *
    * Dans l'algorithme de choix des analyses, les observations correspondent
    * aux éléments observés qui sont différents en fonction des classes d'age
    */
    public function observations()
    {
      return $this->belongsToMany(Observation::class);
    }

    /**
     * Chaque age est associé potentiellement à plusieurs anatype (belongsToMany)
     *
     * Un anatype est un type d'analyse (parasites gastrointestinaux, quantification
     * haemonchus, etc.) auquel est un associé une ou plusieurs classes d'âge.
     * Dans l'algorithme, cela permet un choix plus précis
     *
     */
    public function anatypes()
    {
      return $this->belongsToMany(Analyses\Anatype::class);
    }

    /**
     * Chaque age peut-etre associé à une exclusion (hasOne)
     *
     * Une exclusion est une association d'une espece, éventuellement d'un age
     * d'un anatype et d'une observation: dans l'algoritme on ne propose pas
     * l'anatype correspondant à cette association espece/age/observation
     *
     */
    public function exclusion()
    {
      return $this->hasOne(Exclusion::class);
    }

    /**
     * Chaque age peut être associé à une exclusionsAnaacte (hasOne)
     *
     * Une exclusion anaActe associe une espce, un age (éventuellement), un anaActe
     * et une observation: dans l'algorithme, cela rend impossible de proposer
     * un anaActe associé à cette espece, cet age et cette observation.
     *
     */
    public function exclusionsAnaacte()
    {
      return $this->hasOne(ExclusionsAnaacte::class);
    }

}
