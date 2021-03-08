<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Reglement extends Model
{
    public $timestamps = false;

    public function facture()
    {
      return $this->hasOne(Facture::class);
    }

    public function modereglement()
    {
      return $this->belongsTo(Modereglement::class);
    }
}
