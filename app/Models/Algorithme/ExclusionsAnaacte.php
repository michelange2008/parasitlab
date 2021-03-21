<?php

namespace App\Models\Algorithme;

use Illuminate\Database\Eloquent\Model;
/**
 * [ExclusionsAnaacte description]
 * @deprecated Probablement à supprimer
 * @package Algorithme
 */
class ExclusionsAnaacte extends Model
{
    protected $table = "exclusionsanaacte";
    protected $guarded = [];
    public $timestamps = false;

    public function observation()
    {
      return $this->belongsTo(\App\Models\Algorithme\Observation::class);
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
