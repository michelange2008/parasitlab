<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    public $timestamps = false;
    public $guarded = [];

    public function categorie()
    {
      return $this->belongsTo(Categorie::class);
    }

    public function especes()
    {
      return $this->belongsToMany(Espece::class);
    }

    public function ages()
    {
      return $this->belongsToMany(Age::class);
    }

    public function anaactes()
    {
      return $this->belongsToMany(\App\Models\Analyses\Anaacte::class);
    }

    public function anatypes()
    {
      return $this->belongsToMany(\App\Models\Analyses\Anatype::class);
    }

    public function options()
    {
      return $this->belongsToMany(Option::class);
    }

    public function exclusion()
    {
      return $this->hasOne(Exclusion::class);
    }

    public function exclusionsAnaacte()
    {
      return $this->hasOne(ExclusionsAnaacte::class);
    }
}
