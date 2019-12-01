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

    public function Etat()
    {
      return $this->belongsTo(Etat::class);
    }

    public function Consistance()
    {
      return $this->belongsTo(Consistance::class);
    }
}
