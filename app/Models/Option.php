<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
  public function observations()
  {
    return $this->belongsToMany(Observation::class);
  }

  public function anaactes()
  {
    return $this->belongsToMany(Analyses\Anaacte::class);
  }
}
