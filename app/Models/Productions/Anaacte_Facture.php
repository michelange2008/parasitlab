<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;
/**
 * Table pivot qui met en relation un anaacte et une facture.
 *
 * C'est une table pivot qui possède des colonnes supplémentaires: nombre, pu_ht, tva.
 *
 * L'objectif est que si après l'établissement d'une facture, il y a une modification
 *  d'un anaacte (changement de prix par exemple), cette modification n'a pas
 *  d'incidence sur des factures déjà établies. En effet, le site ne stocke pas les factures
 *  sous forme pdf après leur création, mais les recrée à chaque demande d'édition
 *
 * __Table__:
 * + _id_
 * + _anaacte_id_
 * + _facture_id_
 * + _nombre_: int(10) nombre d'acte de cet anaacte à facturer
 * + _pu_ht_: decimal(8,2) prix unitaire hors taxe
 * + _tvav_id_
 * + _date_: timestamp
 * + _timestamps_
 *
 * @package Productions
 */
class Anaacte_Facture extends Model
{
    /**
     * Nom de la table (comme c'est une table pivot particulière)
     * @var string
     */
    protected $table = "anaacte_facture";

    /**
     * Le taux de tva est indiqué en cas de changement ultérieur
     * @return belongsTo
     */
    public function tva()
    {
      return $this->belongsTo(\App\Models\Analyses\Tva::class);
    }

    /**
     * [anaacte description]
     * @return [type] [description]
     */
    public function anaacte()
    {
      return $this->belongsTo(\App\Models\Analyses\Anaacte::class);
    }
}
