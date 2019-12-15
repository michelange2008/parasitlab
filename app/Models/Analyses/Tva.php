<?php

namespace App\Models\Analyses;

use Illuminate\Database\Eloquent\Model;

class Tva extends Model
{
    public function anaactes()
    {
      return $this->hasMany(Anaactes::class);
    }
}
