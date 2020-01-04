<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function demande()
    {
      return $this->hasOne(Demande::class);
    }

    public function user()
    {
      return $this->belongsTo(\App\User::class, 'facture_dest');
    }
}
