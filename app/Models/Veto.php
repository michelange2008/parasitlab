<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Veto extends Model
{
    public function user()
    {
      return hasOne(User::class);
    }
}
