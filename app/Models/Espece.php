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

    public function Anapacks()
    {
      return $this->belongsToMany(Analyses\Anapack::class);
    }
}
