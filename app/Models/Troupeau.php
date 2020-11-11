<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Troupeau extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function espece()
    {
      return $this->belongsTo(Espece::class);
    }

    public function typeprod()
    {
      return $this->belongsTo(Typeprod::class);
    }

    public function animals()
    {
      return $this->hasMany(Animal::class);
    }

    public function demandes()
    {
      return $this->hasMany(Production\Demande::class);
    }
}
