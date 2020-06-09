<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Espece extends Model
{
    public $timestamps = false;

    public function icone()
    {
      return $this->belongsTo(Icone::class);
    }

    public function ages()
    {
      return $this->hasMany(Age::class);
    }

    public function analyses()
    {
      return $this->hasMany(Analyses\Analyse::class);
    }

    public function demandes()
    {
      return $this->hasMany(Productions\Demande::class);
    }

    public function serie()
    {
      return $this->hasOne(Labo\Serie::class);
    }

    public function Anatypes()
    {
      return $this->belongsToMany(Analyses\Anatype::class);
    }

    public function Anaactes()
    {
      return $this->belongsToMany(Analyses\Anaacte::class);
    }

    public function observations()
    {
      return $this->belongsToMany(Observation::class);
    }

    public function exclusion()
    {
      return $this->hasOne(Exclusion::class);
    }
}
