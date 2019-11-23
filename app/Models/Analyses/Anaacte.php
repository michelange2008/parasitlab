<?php

namespace App\Models\Analyses;

use Illuminate\Database\Eloquent\Model;

class Anaacte extends Model
{
    public $timestamps = false;

    public function anapacks()
    {
      return $this->belongsToMany(Anapack::class);
    }

    public function icone()
    {
      return $this->belongsTo(\App\Models\Icone::class);
    }
}
