<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{

    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
      return $this->belongsTo(\App\User::class);
    }

    public function espece()
    {
      return $this->belongsTo(\App\Models\Espece::class);
    }

    public function anaacte()
    {
      return $this->belongsTo(\App\Models\Analyses\Anaacte::class);
    }

    public function facture()
    {
      return $this->belongsTo(Facture::class);
    }

    public function tovetouser()
    {
      return $this->belongsTo(\App\User::class, 'tovetouser_id', 'id');
    }

    public function prelevements()
    {
      return $this->hasMany(Prelevement::class);
    }

    public function serie()
    {
      return $this->belongsTo(Serie::class);
    }

    public function labo()
    {
      return $this->belongsTo(\App\Models\Labo::class);
    }

    public function commentaire()
    {
      return $this->belongsTo(Commentaire::class);
    }

    public function troupeau()
    {
      return $this->belongsTo(\App\Models\Troupeau::class);
    }
    public function userfact()
    {
      return $this->belongsTo(\App\User::class, 'userfact_id', 'id');
    }
}
