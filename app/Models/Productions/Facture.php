<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

/**
 * Facture d'un ou plusieurs Acte
 *
 * La ligne est remplie quand on établi la facture qui possède un User et plusieurs
 * Anaacte via une table pivot. En outre, une facture a des dates (faite, envoyée, payée)
 * et des booléens pour l'état (envoyée, payée). En plus elle est en relation avec Reglement.
 *
 * __Table__:
 * + _id_ int(10) UNSIGNED NOT NULL,
 * + _user_id_ int(10) UNSIGNED NOT NULL,
 * + _faite_date_ timestamp NULL DEFAULT NULL,
 * + _envoyee_ tinyint(1) NOT NULL DEFAULT 0,
 * + _envoyee_date_ timestamp NULL DEFAULT NULL,
 * + _payee_ tinyint(1) NOT NULL DEFAULT 0,
 * + _reglement_id_ int(10) UNSIGNED DEFAULT NULL,
 * + _deleted_at_ timestamp NULL DEFAULT NULL
 *
 * @package Productions
 * @subpackage Factures
 */
class Facture extends Model
{
    /**
     * @var array champs qui ne sont pas mass-assignable
     */
    protected $guarded = [];
    /**
     * @var timestamps les dates created_at et updated_at sont peu pertinentes
     */
    public $timestamps = false;

    /**
     * Toute facture a un User
     * @see \App\User
     * @return belongsTo
     */
    public function user()
    {
      return $this->belongsTo(\App\User::class);
    }

    /**
     * Toute facture est la somme d'un ou plusieurs Anaacte qui eux peuvent se
     * retrouver dans différentes factures -> d'où une table pivot
     * @see \App\Models\Analyses\Anaacte
     * @return belongsToMany
     */
    public function anaactes()
    {
      return $this->belongsToMany(\App\Models\Analyses\Anaacte::class);
    }

    /**
     * Une facture réglèe est associée à un des modes de règlements (qui est null
     * tant que la facture n'a pas été réglée)
     * @see \App\Models\Productions\Reglement
     * @return belongsTo
     */
    public function Reglement()
    {
      return $this->belongsTo(Reglement::class);
    }
}
