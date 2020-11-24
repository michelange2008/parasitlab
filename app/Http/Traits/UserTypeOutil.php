<?php
namespace App\Http\Traits;

use App\Models\Usertype;
use App\Models\Eleveur;
use App\Models\Veto;
use App\Models\Labo;

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

  public function personne($user_id)
  {

    if($personne = Veto::where('user_id' ,$user_id)->first()) {
      return $personne;
    }

    elseif($personne = Eleveur::where('user_id' ,$user_id)->first()) {
      return $personne;
    }

    elseif($personne = Labo::where('user_id', $user_id)->first()) {
      return $personne;
    }

    else {
      return null;
    }

  }
}
