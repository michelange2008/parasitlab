<?php

namespace App\Models\Analyses;

use Illuminate\Database\Eloquent\Model;

class Anapack extends Model
{
    public $timestamps = false;

    public function anaactes()
    {
      return $this->belongsToMany(Anaacte::class);
    }

    public function icone()
    {
      return $this->belongsTo(\App\Models\Icone::class);
    }

    public function serie()
    {
      return $this->hasOne(App\Models\Productions\Serie::class);
    }

}
