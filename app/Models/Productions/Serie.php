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

    public function anaacte()
    {
      return $this->belongsTo(\App\Models\Analyses\Anaacte::class);
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
