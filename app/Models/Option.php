<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
  public function options()
  {
    return $this->belongsToMany(Observation::class);
  }
}
