<?php

namespace App\Models\Analyses;

use Illuminate\Database\Eloquent\Model;

/**
 * Type de TVA appliacable à un anaacte
 *
 * Il s'agit du taux exprimé en décimal: 0, 0,1, 0,2, 0,055
 *
 * __Table__:
 * + _id_
 * + _taux_: decima(8,3)
 * @package Analyses
 */
class Tva extends Model
{
    /**
     * Chaque Anaacte a un taux
     * @return hasMany
     */
    public function anaactes()
    {
      return $this->hasMany(Anaactes::class);
    }

    /**
     * Une fois une facture établie le taux de de tva est fixé et si le taux de tva d'un anaacte change
     * cela ne se répercutera pas sur la facture: c'est la raison de cette relation.
     * @return hasMany
     */
    public function anaactes_factures()
    {
      return $this->hasMany(\App\Models\Productions\Anaacte_Facture::class);
    }
}
