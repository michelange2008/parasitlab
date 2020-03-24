<?php

namespace App\Models\Analyses;

use Illuminate\Database\Eloquent\Model;

class Anaacte extends Model
{
    public $timestamps = false;

    public function demandes()
    {
      return $this->hasMany(\App\Models\Production\Demande::class);
    }

    public function anatype()
    {
      return $this->belongsTo(Anatype::class);
    }

    public function icone()
    {
      return $this->belongsTo(\App\Models\Icone::class);
    }

    public function tva()
    {
      return $this->belongsTo(Tva::class);
    }

    public function factures()
    {
      return $this->belongsToMany(Factures::class);
    }
}
