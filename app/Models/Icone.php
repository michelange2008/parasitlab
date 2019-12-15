<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Icone extends Model
{
  public $timestamps = false;

  public function analyses()
  {
    return $this->hasMany(Analyses\Analyse::class);
  }

  public function especes()
  {
    return $this->hasOne(Icone::class);
  }

  public function usertype()
  {
    return $this->hasOne(Usertype::class);
  }

  public function anapack()
  {
    return $this->hasOne(Analyses\Anapack::class);
  }

  public function anaacte()
  {
    return $this->hasOne(Analyses\Anaacte::class);
  }

  public function labo()
  {
    return $this->hasOne(Labo::class);
  }
}
