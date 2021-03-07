<?php

namespace App\Models\Analyses;

use Illuminate\Database\Eloquent\Model;

/**
 * Définit le type d'estimation d'un parasite
 *
 * Est-ce une valeur, une estimation, une présence/absence ou un pourcentage
 *
 * __Table__:
 * + _id_
 * + _nom_: varchar(20)
 * @package Analyses
 */
class Qtt extends Model
{
   /**
   * @var boolean
   */
    public $timestamps = false;

    /**
     * Un anaitem a toujours une Qtt mais une mêm Qtt peut s'appliquer à plusieurs Anaitem
     * @return hasMany
     */
    public function anaitems()
    {
      return $this->hasMany('Anaitem');
    }
}
