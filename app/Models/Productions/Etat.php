<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    public function Prelevements()
    {
      return $this->hasMany(Prelevement::class);
    }
}
