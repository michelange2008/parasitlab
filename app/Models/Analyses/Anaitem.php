<?php

namespace App\Models\Analyses;

use Illuminate\Database\Eloquent\Model;


class Anaitem extends Model
{
    public $timestamps = false;

    public function qtt()
    {
      return $this->belongsTo(Qtt::class);
    }

    public function unite()
    {
      return $this->belongsTo(Unite::class);
    }
}
