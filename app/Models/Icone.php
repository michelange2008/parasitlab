<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Icone associée à n'importe quel élément qui doit être illustré
 *
 * Le choix de faire un model Icone est lié à la création d'une banque d'icone
 * pour pouvoir télécharger et utiliser facilement les icones.
 *
 * Dans la majorité des cas, les icones sont liées par une relation de type __hasOne__
 * Sauf pour les Analyse où c'est __hasMany__ (je ne sais plus pourquoi).
 *
 * __La table icone compte deux champs:__
 * + id
 * + nom (nom complet avec extension)
 *
 * Toutes les icones sont en svg sauf quelques exceptions
 */
class Icone extends Model
{
  public $timestamps = false;

  public function analyses()
  {
    return $this->hasMany(Analyses\Analyse::class);
  }

  public function especes()
  {
    return $this->hasOne(Icone::class);
  }

  public function ages()
  {
    return $this->hasOne(Age::class);
  }

  public function usertype()
  {
    return $this->hasOne(Usertype::class);
  }

  public function anatype()
  {
    return $this->hasOne(Analyses\Anatype::class);
  }

  public function anaacte()
  {
    return $this->hasOne(Analyses\Anaacte::class);
  }

  public function modereglement()
  {
    return $this->hasOne(Productions\Modereglement::class);
  }

}
