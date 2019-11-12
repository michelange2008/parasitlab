<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usertype extends Model
{
    public $timestamps = false;

    public function users()
    {
      return $this->hasMany(\App\User::class);
    }

    public function icone()
    {
      return $this->belongsTo(Icone::class);
    }
}
