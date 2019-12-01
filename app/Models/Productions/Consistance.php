<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Consistance extends Model
{
  public $timestamps = false;

    public function Prelevements()
    {
      return $this->hasMany(Prelevement::class);
    }
}
