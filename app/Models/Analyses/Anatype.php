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
}
