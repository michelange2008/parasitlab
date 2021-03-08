<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

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
