<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Melange extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function prelement()
    {
      return $this->hasMany(Prelevement::class);
    }

    /**
     * Un mélange appartient à plusieurs animaux
     */
    public function animals()
    {
      return $this->belongsToMany(\App\Models\Animal::class);
    }

    /**
     * Un mélange n'appartient qu'à un seul troupeau
     */
    public function troupeau()
    {
      return $this->belongsTo(\App\Models\Troupeau::class);
    }

}
