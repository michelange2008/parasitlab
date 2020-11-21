<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Veto extends Model
{
    protected $fillable = ['user_id'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function eleveurs()
    {
      return $this->hasMany(Eleveur::class);
    }

}
