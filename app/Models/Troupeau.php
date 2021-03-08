<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
/**
 * Troupeau définit un troupeau dans le cadre d'une demande d'analyse.
 *
 * Un troupeau appartient à un User, à une Espece et à un type de production (Typeprod)
 *
 * Un troupeau possède des Animals et des Demandes (d'analyses)
 *
 * __Table troupeauxs:__
 * + id
 * + user_id
 * + espece_id
 * + typeprod_id
 * @package Animaux
 */
class Troupeau extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    /**
     * Appartient à un User
     * @return belongsTo
     */
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    /**
     * Appartient à une Espece
     * @return belongsTo
     */
    public function espece()
    {
      return $this->belongsTo(Espece::class);
    }

    /**
     * Appartient à un Typeprod
     * @return belongsTo
     */
    public function typeprod()
    {
      return $this->belongsTo(Typeprod::class);
    }

    /**
     * Possède des Animals
     * @return hasMany
     */
    public function animals()
    {
      return $this->hasMany(Animal::class);
    }

    /**
     * Possède des Demandes d'analyse
     * @return hasMany
     */
    public function demandes()
    {
      return $this->hasMany(Production\Demande::class);
    }
}
