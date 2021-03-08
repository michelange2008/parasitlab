<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Modereglement extends Model
{
    public $timestamps = false;

    public function icone()
    {
      return $this->belongsTo(\App\Models\Icone::class);
    }

    public function reglement()
    {
      return $this->hasMany(Reglement::class);
    }
}
