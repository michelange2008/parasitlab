<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * User spécifique qui possède tous les droits sur le site
 *
 * Labo est un utilisateur comme Veto et Eleveur, mais il a accès à l'intégralité
 * du site: il peut gérer les utilisateurs, les types d'analyses, les demandes, etc.
 * C'est un utilisateur qui a un Usertype nommé "laboratoire".
 *
 * Dans la majorité des cas quand il y une relation d'un autre model avec un User
 * de type laboratoire, c'est le sont id dans le model User qui est utilisé et
 * non son id issue du modèle Labo.
 *
 * La seule exception concerne la demande d'analyse (car ça a été fait comme ça
 * au départ et après c'était trop risqué de rechanger ça).
 *
 * Les champs de la table sont les suivants: id, user_id, signature (nom d'un fichier image),
 * fonction (texte), est_signataire (booléen), timestamps)
 *
 * @package Utilisateurs
 */
class Labo extends Model
{
  protected $fillable = ['user_id'];

  /**
   * Tout Labo est lié à un User par une relation belongsTo
   *
   * Un objet Labo ne pas ne pas être lié à un User car c'est ce qui détermine
   * son état d'utilisateur avec des possibilités de connexion
   *
   * @return belongsTo
   */
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Tout Labo est lié aux demandes d'analyse par des relations hasMany
   *
   * Une demande d'analyse à forcément un labo_id qui correspond à celui qui
   * saisit la première fois cette demande.
   *
   * @return hasMany
   */
  public function demandes()
  {
    return $this->hasMany(\App\Models\Productions\Demande::class);
  }
}
