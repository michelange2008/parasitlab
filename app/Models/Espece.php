<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Espece extends Model
{
    public $timestamps = false;

    public function icone()
    {
      return $this->hasOne(Icone::class);
    }

    public function analyses()
    {
      return $this->hasMany(Analyses\Analyse::class);
    }
}
