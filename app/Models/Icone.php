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

  public function ages()
  {
    return $this->hasOne(Age::class);
  }

  public function usertype()
  {
    return $this->hasOne(Usertype::class);
  }

  public function anatype()
  {
    return $this->hasOne(Analyses\Anatype::class);
  }

  public function anaacte()
  {
    return $this->hasOne(Analyses\Anaacte::class);
  }

  public function modereglement()
  {
    return $this->hasOne(Productions\Modereglement::class);
  }

}
