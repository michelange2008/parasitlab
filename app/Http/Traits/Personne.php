<?php
namespace App\Http\Traits;

use App\Models\Labo;
use App\Models\Veto;
use App\Models\Eleveur;

/**
 * Renvoie le soususer (véto, éleveur ou labo) à partir de l'id de l'User
 */
trait Personne
{
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
