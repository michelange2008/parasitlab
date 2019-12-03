<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;
use App\Models\Espece;

class Serie extends Model
{

    public function demandes()
    {
      return $this->hasMany(Demande::class);
    }

    public function anapack()
    {
      return $this->belongsTo(\App\Models\Analyses\Anapack::class);
    }

    public function espece()
    {
      return $this->belongsTo(\App\Models\Espece::class);
    }

    public function user()
    {
      return $this->belongsTo(\App\User::class);
    }
}
