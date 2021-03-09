<?php

namespace App\Models\Productions;

use Illuminate\D
/**
 * Table pivot qui met en relation un anaacte et une facture.
 *
 * C'est une table pivot qui possède des colonnes supplémentaires: nombre, pu_ht, tva.
 *
 * L'objectif est que si après l'établissement d'une facture, il y a une modification
 *  d'un anaacte (changement de prix par exemple), cette modification n'a pas
 *  d'incidence sur des factures déjà établies. En effet, le site ne stocke pas les factures
 *  sous forme pdf après leur création, mais les recrée à chaque demande d'édition
 */
class Anaacte_Facture extends Model
{
    protected $table = "anaacte_facture";

    public function tva()
    {
      return $this->belongsTo(\App\Models\Analyses\Tva::class);
    }

    public function anaacte()
    {
      return $this->belongsTo(\App\Models\Analyses\Anaacte::class);
    }
}
