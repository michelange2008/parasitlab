<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function Demande()
    {
      return $this->belongsTo(Demande::class);
    }

    public function Labo()
    {
      return $this->belongsTo(\App\Models\Labo::class);
    }
}
