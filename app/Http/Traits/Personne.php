<?php
namespace App\Http\Traits;

use App\Models\Labo;
use App\Models\Veto;
use App\Models\Eleveur;

/**
 * Renvoie le soususer (véto, éleveur ou labo) à partir de l'id de l'User
 *
 * En fait, il aurait fallu faire une classe Personne abstraite dont les classes
 * Labo, Eleveur et Veto hériteraient :)
 */
trait Personne
{
  /**
   * Renvoie le soususer (Veto, Eleveur ou Labo) à partir de l'id de l'User
   * @param  int $user_id id de l'utilisateur dont on veut le soususer
   * @return \App\Models\Model Veto ou Eleveur ou Labo
   */
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
