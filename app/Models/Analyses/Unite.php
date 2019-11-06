<?php

namespace App\Models\Analyses;

use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    public $timestamps = false;

    public function anaitems()
    {
      return $this->hasMany(Anaitem::class);
    }
}
