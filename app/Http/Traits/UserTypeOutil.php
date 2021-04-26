<?php
namespace App\Http\Traits;

use App\Models\Usertype;
use App\User;
use App\Models\Eleveur;
use App\Models\Veto;
use App\Models\Labo;

/**
 * Fournit différentes méthodes pour connaître l'User authentifié
 * @package Utilisateurs
 */
trait UserTypeOutil {

  /**
   * Trait UserType: Renvoie true si l'User est veterinaire
   * @param  int $usertype_id type d'User
   * @return boolean
   */
  public function estVeto($usertype_id)
  {
    $usertype = Usertype::find($usertype_id);

    return ($usertype->route === "veterinaire");
  }

  /**
   * Trait UserType: Renvoie true si l'User est eleveur
   * @param  int $usertype_id type d'User
   * @return boolean
   */
  public function estEleveur($usertype_id)
  {
    $usertype = Usertype::find($usertype_id);

    return ($usertype->route === "eleveur");
  }

  /**
   * Trait UserType: Renvoie true si l'User est labo
   * @param  int $usertype_id type d'User
   * @return boolean
   */
  public function estLabo($usertype_id)
  {
    $usertype = Usertype::find($usertype_id);

    return ($usertype->route === "laboratoire");
  }

  /**
   * Trait UserType: Renvoie un UserType eleveur
   * @return \App\Models\Usertype
   */
  public function userTypeEleveur()
  {
    return UserType::where('route', 'eleveur')->first();

  }

  /**
   * Trait UserType: Renvoie un UserType veterinaire
   * @return \App\Models\Usertype
   */
  public function userTypeVeto()
  {
    return UserType::where('route', 'veterinaire')->first();
  }

  /**
   * Trait UserType: Renvoie un UserType laboratoire
   * @return \App\Models\Usertype
   */
  public function userTypeLabo()
  {
    return UserType::where('route', 'laboratoire')->first();
  }

  /**
   * Trait qui renvoie une liste de user qui sont usertype eleveur
   */
  public function listeEleveurs()
  {
    return User::where('usertype_id', $this->userTypeEleveur()->id)
                  ->orderBy('name')
                  ->get();
  }

}
