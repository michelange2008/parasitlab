<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExclusionsAnaacte extends Model
{
    protected $table = "exclusionsanaacte";
    protected $guarded = [];
    public $timestamps = false;

    public function observation()
    {
      return $this->belongsTo(\App\Models\Observation::class);
    }

    public function anaacte()
    {
      return $this->belongsTo(\App\Models\Analyses\Anaacte::class);
    }

    public function espece()
    {
      return $this->belongsTo(\App\Models\Espece::class);
    }

    public function age()
    {
      return $this->belongsTo(\App\Models\Age::class);
    }


}
