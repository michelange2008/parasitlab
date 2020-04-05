<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    public $timestamps = false;

    public function categorie()
    {
      return $this->belongsTo(Catégorie::class);
    }

    public function especes()
    {
      return $this->belongsToMany(Espece::class);
    }

    public function anaactes()
    {
      return $this->belongsToMany(\App\Models\Analyses\Anaacte::class);
    }
}