<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Eleveur extends Model
{
    protected $fillable = ['user_id'];
    
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function veto()
    {
      return $this->belongsTo(Veto::class);
    }
}
