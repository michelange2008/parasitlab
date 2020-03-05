<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Acte extends Model
{
  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(\App\User::class);
  }

  public function anaacte()
  {
    return $this->belongsTo(\App\Models\Analyses\Anaacte::class);
  }

  public function facture()
  {
    return $this->belongsTo(Facture::class);
  }
}
