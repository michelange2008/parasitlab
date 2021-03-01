<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * Une des catégories (usertypes) d'User: Eleveur est le propriétaire
 * des animaux sur lesquels sont fait les analyses
 *
 * Comme les deux autres catégories d'user (Labo, Véto), Eleveur appartient à user
 * Il a aussi une relation belongsTo à Veto car un éleveur peut avoir un véto attitré 
 *
 */
class Eleveur extends Model
{
    protected $fillable = ['user_id'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function veto()
    {
      return $this->belongsTo(Veto::class);
    }
}
