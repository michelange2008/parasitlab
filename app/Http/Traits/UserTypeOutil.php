<?php
namespace App\Http\Traits;

use App\Models\Usertype;

trait UserTypeOutil {

  public function estVeto($usertype_id)
  {
    $usertype = Usertype::find($usertype_id);

    return ($usertype->route === "veterinaire");
  }

  public function estEleveur($usertype_id)
  {
    $usertype = Usertype::find($usertype_id);

    return ($usertype->route === "eleveur");
  }

  public function estLabo($usertype_id)
  {
    $usertype = Usertype::find($usertype_id);

    return ($usertype->route === "laboratoire");
  }

  public function userTypeEleveur()
  {
    return UserType::where('route', 'eleveur')->first();

  }

  public function userTypeVeto()
  {
    return UserType::where('route', 'veterinaire')->first();
  }

  public function userTypeLabo()
  {
    return UserType::where('route', 'laboratoire')->first();
  }

  public function personne($user)
  {
      switch ($user->usertype->route) {
        case 'laboratoire':
          $personne = $user->labo;
          break;

        case 'eleveur':
          $personne = $user->eleveur;
          break;

        case 'veterinaire':
          $personne = $user->veto;
          break;

        default:
          $personne = '';
          break;
      }

      return $personne;

  }
}
