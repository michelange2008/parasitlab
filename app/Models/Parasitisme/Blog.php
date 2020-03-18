<?php

namespace App\Models\Parasitisme;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function user()
    {
      return $this->belongsTo(\App\User::class);
    }


    public function motclefs()
    {
      return $this->belongsToMany(Motclef::class);
    }
}
