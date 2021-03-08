<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * User avec les caractéristiques d'un usertype vétérinaire.
 *
 * C'est une des trois usertypes avec Labo et Eleveur.
 *
 * Le Veto a un accès à sa page perso qui présent toutes les demandes d'analyse
 * pour lequelles il est aussi destinataire des résultats
 *
 * __Table vetos:__
 * + id
 * + user_id
 * + num: varchar(255) --> numéro d'inscription à l'ordre
 * + address_1: varchar(191)
 * + address_2: varchar(191)
 * + cp: varchar(10)
 * + commune : varchar(191)
 * + pays: varchar(191)
 * + indicatif:varchar(3)
 * + tel: varchar(10)
 * + timestamps
 *
 * @package Utilisateurs
 */
class Veto extends Model
{
    protected $fillable = ['user_id'];

    /**
     * Tout Veto appartient à un User
     *
     * @return belongsTo
     */
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    /**
     * Un Veto a plusieurs éleveurs
     *
     * @return hasMany
     */
    public function eleveurs()
    {
      return $this->hasMany(Eleveur::class);
    }

}
