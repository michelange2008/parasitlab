<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
  protected $guarded = [];
  public $timestamps = false;

  public function troupeau()
  {
    return $this->belongsTo(Troupeau::class);
  }

  public function prelevements()
  {
    return $this->hasMany(Productions\Prelevement::class);
  }

}
