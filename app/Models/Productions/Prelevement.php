<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Prelevement extends Model
{

    public function demande()
    {
      return $this->belongsTo(Demande::class);
    }

    public function analyse()
    {
      return $this->belongsTo(\App\Models\Analyses\Analyse::class);
    }

    public function resultats()
    {
      return $this->hasMany(Resultat::class);
    }

    public function etat()
    {
      return $this->belongsTo(Etat::class);
    }

    public function signes()
    {
      return $this->belongsToMany(Signe::class);
    }

    public function animal()
    {
      return $this->belongsTo(\App\Models\Animal::class);
    }
}
