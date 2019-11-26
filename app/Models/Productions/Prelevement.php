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
}
