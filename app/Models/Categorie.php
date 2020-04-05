<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
  public $timestamps = false;

  public function observations()
  {
    return $this->hasMany(Observation::class);
  }

}
