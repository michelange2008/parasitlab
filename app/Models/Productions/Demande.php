<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{

    protected $guarded = [];

    public function user()
    {
      return $this->belongsTo(\App\User::class);
    }

    public function espece()
    {
      return $this->belongsTo(\App\Models\Espece::class);
    }

    public function anapack()
    {
      return $this->belongsTo(\App\Models\Analyses\Anapack::class);
    }

    public function facture()
    {
      return $this->belongsTo(Facture::class);
    }

    public function veto()
    {
      return $this->belongsTo(\App\Models\Veto::class);
    }

    public function prelevements()
    {
      return $this->hasMany(Prelevement::class);
    }
}
