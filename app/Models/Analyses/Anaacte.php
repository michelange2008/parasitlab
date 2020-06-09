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

    public function series()
    {
      return $this->hasMany(\App\Models\Production\Serie::class);
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

    public function observations()
    {
      return $this->belongsToMany(\App\Models\Observation::class);
    }

    public function options()
    {
      return $this->belongsToMany(\App\Models\Option::class);
    }

    public function especes()
    {
      return $this->belongsToMany(\App\Models\Espece::class);
    }

    public function ages()
    {
      return $this->belongsToMany(\App\Models\Age::class);
    }

    public function exclusion()
    {
      return $this->hasOne(\App\Models\Analyses\Anaacte::class);
    }
}
