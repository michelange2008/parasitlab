<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    // public function demandes()
    // {
    //   return $this->hasMany(Demande::class);
    // }

    public function user()
    {
      return $this->belongsTo(\App\User::class);
    }

    public function anaactes()
    {
      return $this->belongsToMany(\App\Models\Analyses\Anaacte::class);
    }

    public function Reglement()
    {
      return $this->belongsTo(Reglement::class);
    }
}
