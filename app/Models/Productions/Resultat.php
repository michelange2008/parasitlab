<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    protected $guarded = [];
    
    public $timestamps = false;

    public function prelevement()
    {
      return $this->belongsTo(Prelevement::class);
    }

    public function anaitem()
    {
      return $this->belongsTo(\App\Models\Analyses\Anaitem::class);
    }
}
