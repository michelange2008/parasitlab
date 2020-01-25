<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Labo extends Model
{
  protected $fillable = ['user_id'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function demandes()
  {
    return $this->hasMany(\App\Models\Productions\Demande::class);
  }

}
