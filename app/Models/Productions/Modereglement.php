<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

/**
 * Mode de réglement d'une facture
 *
 * Chèque, virement ou espèces (pas encore prévu prélèvements)
 *
 * __Table__:
 * + _id_ int(10) UNSIGNED NOT NULL,
 * + _nom_ varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
 * + _icone_id_ int(10) UNSIGNED NOT NULL DEFAULT 1
 *
 * @package Productions
 */
class Modereglement extends Model
{
    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Une icone est associée à un mode de règlement
     * @return belongsTo
     */
    public function icone()
    {
      return $this->belongsTo(\App\Models\Icone::class);
    }

    /**
     * Tout règlement a un mode de règlement
     * @return hasMany
     */
    public function reglement()
    {
      return $this->hasMany(Reglement::class);
    }
}
