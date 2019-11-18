<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $guarded = [];

    public function demande()
    {
      return $this->hasOne(Demande::class);
    }

}
