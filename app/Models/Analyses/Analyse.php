<?php

namespace App\Models\Analyses;

use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
    public $timestamps = false;

    public function espece()
    {
      return $this->belongsTo(\App\Models\Espece::class);
    }

    public function icone()
    {
      return $this->belongsTo(\App\Models\Icone::class);
    }

    public function prelevements()
    {
      return $this->hasMany(\App\Models\Productions\Prelevement::class);
    }

}
