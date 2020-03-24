<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Signe extends Model
{
    public $timestamps = false;

    public function prelevements()
    {
      return $this->belongsToMany(Prelevement::class);
    }
}
