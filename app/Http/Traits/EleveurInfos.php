<?php
namespace App\Http\Traits;

use DB;

use App\User;
use App\Models\Productions\Demande;
/**
 * RENVOI DES INFORMATIONS SUR L'UTILISATEUR: NOMBRE DE DEMANDES, NOMBRE DE FACTURES IMPAYEES
 */
use App\Http\Traits\FormatNum;

trait EleveurInfos
{

  use FormatNum;

  // RENVOIE UNE COLLECTION AVEC LES DIFFERENTES INFO
  public function eleveurInfos($user)
  {
    $eleveurInfos = Collect();

    $eleveurInfos->nbDemandes = $this->nbDemandes($user);
    $eleveurInfos->factureImpayees = $this->factureImpayees($user);

    return $eleveurInfos;

  }

  function nbDemandes($user)
  {
    return Demande::where('user_id', $user->id)->count();
  }

  public function factureImpayees($user)
  {
    $facturesImpayees = DB::table('demandes')
              ->join('factures', 'factures.id', '=', 'demandes.facture_id')
              ->where('factures.faite', 1)
              ->where('factures.payee', 0)
              ->where('demandes.user_id', $user->id)
              ->count();

    return $facturesImpayees;
  }


  public function eleveurFormatNumber($user)
  {

    $user->eleveur->num = $this->numAvecEspace($user->eleveur->num);

    $user->eleveur->tel = $this->telAvecEspace($user->eleveur->tel);

    return $user;

  }
}
