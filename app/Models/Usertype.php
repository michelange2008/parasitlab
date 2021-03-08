<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Usertype définit le type d'User et donc ses droits d'accès au site. Chaque
 * usertype renvoie à un model particulier (sorte de classe "héritée")
 *
 * _(Il aurait fallu que j'utilise le concept de rôle existant dans Laravel mais
 * je ne connaissais pas)_
 *
 * Initialement, il y a trois Usertype:
 * + __laboratoire:__ accès intégral - model Labo
 * + __éleveur:__ accès à page perso (avec ses analyses) - model Eleveur
 * + __vétérinaire:__ accès à page perso (avec analyses de ses éleveurs) _ model Veto
 *
 * _On pourrait imaginer rajouter un model Admin (avec moins de droits sur le model Labo)_
 * @package Utilisateurs
 */
class Usertype extends Model
{
    public $timestamps = false;

    public function users()
    {
      return $this->hasMany(\App\User::class);
    }

    public function icone()
    {
      return $this->belongsTo(Icone::class);
    }
}
