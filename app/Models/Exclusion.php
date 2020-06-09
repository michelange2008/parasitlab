<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exclusion extends Model
{
  public $timestamps = false;

  protected $fillable = ['espece_id', 'age_id', 'observation_id', 'anaacte_id']; 

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
