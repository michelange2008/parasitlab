<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Melange extends Model
{
    public $timestamps = false;

    public function prelement()
    {
      return $this->hasMany(Prelevement::class);
    }

}
