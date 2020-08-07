<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    public $timestamps = false;

    public function icone()
    {
      return $this->belongsTo(Icone::class);
    }

    public function espece()
    {
      return $this->belongsTo(Espece::class);
    }

    public function observations()
    {
      return $this->belongsToMany(Observation::class);
    }

    public function anatypes()
    {
      return $this->belongsToMany(Analyses\Anatype::class);
    }

    public function exclusion()
    {
      return $this->hasOne(Exclusion::class);
    }
    public function exclusionsAnaacte()
    {
      return $this->hasOne(ExclusionsAnaacte::class);
    }

}
