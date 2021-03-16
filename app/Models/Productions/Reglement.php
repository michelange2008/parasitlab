<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

/**
 * Réglement d'une Facture
 *
 * Quand une facture est réglée, le règlement est ajouté dans la table correspondantes
 *
 * Il n'y a pas de référence à la facture car c'est dans la table _factures_ que l'on
 * trouve un champs _reglement_id_ qui est null tant que la facture n'est pas réglée.
 *
 * _Table_:
* + _id_: int(10) UNSIGNED NOT NULL,
* + _modereglement_id_: int(10) UNSIGNED NOT NULL,
* + _date_reglement_: timestamp NULL DEFAULT NULL
*
* @package Productions
 */
class Reglement extends Model
{
    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Tout Reglement est lié à une Facture et une seule
     *
     * @see \App\Models\Productions\Facture
     * @return hasOne
     */
    public function facture()
    {
      return $this->hasOne(Facture::class);
    }

    /**
     * Tout réglement est lié à un mode de règlement qui peut concerner plusieurs factures.
     *
     * @see \App\Models\Productions\Modereglement
     * @return belongsTo
     */
    public function modereglement()
    {
      return $this->belongsTo(Modereglement::class);
    }
}
