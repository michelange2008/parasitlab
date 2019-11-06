<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    public function user()
    {
      return $this->belongsTo(App\User::class);
    }
}
