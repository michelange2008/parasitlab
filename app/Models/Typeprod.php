<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typeprod extends Model
{
  protected $guarded = [];
  public $timestamps = false;

  public function espece()
  {
    return $this->belongsTo(Espece::class);
  }

  public function troupeaus()
  {
    return $this->hasMany(Troupeau::class);
  }

}
