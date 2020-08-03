<?php

namespace App\Models\Analyses;

use Illuminate\Database\Eloquent\Model;

class Anatype extends Model
{
    public $timestamps = false;

    public function anaactes()
    {
      return $this->hasMany(Anaacte::class);
    }

    public function icone()
    {
      return $this->belongsTo(\App\Models\Icone::class);
    }

    public function especes()
    {
      return $this->belongsToMany(\App\Models\Espece::class);
    }

    public function analyses()
    {
      return $this->hasMany(Analyse::class);
    }

    public function observations()
    {
      return $this->belongsToMany(\App\Models\Observation::class);
    }

    public function options()
    {
      return $this->belongsToMany(\App\Models\Option::class);
    }

    public function ages()
    {
      return $this->belongsToMany(\App\Models\Age::class);
    }

    public function exclusion()
    {
      return $this->hasOne(\App\Models\Exclusion::class);
    }
}
