<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Reglement extends Model
{
    public $timestamps = false;

    public function icone()
    {
      return $this->belongsTo(\App\Models\Icone::class);
    }

    public function facture()
    {
      return $this->hasOne('Facture::class');
    }
}
