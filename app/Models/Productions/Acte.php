<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;
/**
 * Acte réalisé pour un client
 *
 * IL s'agit d'un acte pris dans la liste des anaactes et qui va faire l'objet
 * (ou a fait l'objet d'une facturation). Outre le fait d'être relié à un User,
 * un Anaacte et une Facture, cet acte a les propriétés suivantes: nombre, facturee.
 *
 * __Table__:
 * + _id_
 * + _user_id_
 * + _anaacte_id_
 * + _nombre_: int(10) Nombre d'actes de ce type réalisés
 * + _facturee_: booléen Vrai si l'acte a été facturé
 * + _facture_id_
 * + _timestamps_
 *
 * @package Productions
 */
class Acte extends Model
{
  /**
   * @var array string
   */
  protected $guarded = [];

  /**
   * Tout acte appartient à un User
   * @see \App\User
   * @return belongsTo
   */
  public function user()
  {
    return $this->belongsTo(\App\User::class);
  }

  /**
   * Tout acte appartient à un Anaacte
   * @see \App\Models\Analyses\Anaacte
   * @return belongsTo
   */
  public function anaacte()
  {
    return $this->belongsTo(\App\Models\Analyses\Anaacte::class);
  }

  /**
   * Tout acte appartient à une facture (nullable si la facture n'a pas été établie)
   * @see Facture
   * @return belongsTo
   */
  public function facture()
  {
    return $this->belongsTo(Facture::class);
  }
}
