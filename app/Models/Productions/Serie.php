<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public function demandes()
    {
      return $this->hasMany(Demande::class);
    }
}
