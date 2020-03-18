<?php

namespace App\Models\Parasitisme;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function user()
    {
      return $this->belongsTo(User::class);
    }


    public function motclefs()
    {
      return $this->belongsToMany(Motclef::class);
    }
}
