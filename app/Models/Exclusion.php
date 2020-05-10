<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exclusion extends Model
{
  public $timestamps = false;

  public function observations()
  {
    return $this->belongsToMany(\App\Models\Observation::class);
  }

  public function anaactes()
  {
    return $this->belongsToMany(\App\Models\Analyses\Anaacte::class);
  }

}
