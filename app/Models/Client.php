<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Client extends Model
{
    public function veto()
    {
      return $this->belongsTo(Veto::class);
    }
}
