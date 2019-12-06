<?php
namespace App\Http\Traits;

use DB;

use App\User;
use App\Models\Productions\Demande;
/**
 * RENVOI DES INFORMATIONS SUR L'UTILISATEUR: NOMBRE DE DEMANDES, NOMBRE DE FACTURES IMPAYEES
 */
trait infosUser
{

  function nbDemandes($user)
  {
    return Demande::where('user_id', $user->id)->count();
  }

  public function factureImpayees($user)
  {
    $facturesImpayees = DB::table('demandes')
              ->join('factures', 'demandes.id', '=', 'factures.demande_id')
              ->where('factures.faite', 1)
              ->where('factures.payee', 0)
              ->where('demandes.user_id', $user->id)
              ->count();

    return $facturesImpayees;
  }

  // RENVOIE UNE COLLECTION AVEC LES DIFFERENTES INFO
  public function infosUser($user)
  {
    $infosUser = Collect();

    $infosUser->nbDemandes = $this->nbDemandes($user);
    $infosUser->factureImpayees = $this->factureImpayees($user);

    return $infosUser;

  }
}
