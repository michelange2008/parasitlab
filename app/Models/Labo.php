<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Labo extends Model
{
  protected $fillable = ['user_id'];

  public function user()
  {
    return $this->hasOne(User::class);
  }

}
