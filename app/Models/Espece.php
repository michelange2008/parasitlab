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

    public function anatypes()
    {
      return $this->belongsToMany(Analyses\Anatype::class);
    }

    public function observations()
    {
      return $this->belongsToMany(Observation::class);
    }

    public function exclusion()
    {
      return $this->hasOne(Exclusion::class);
    }

    public function exclusionsAnaacte()
    {
      return $this->hasOne(ExclusionsAnaacte::class);
    }

    public function typeprods()
    {
      return $this->hasMany(Typeprod::class);
    }

    public function troupeaus()
    {
      return $this->hasMany(Troupeau::class);
    }
}
