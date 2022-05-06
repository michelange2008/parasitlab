<?php
namespace App\Http\Traits;

use Log;
use DB;

use App\Models\Troupeau;
use App\Models\Eleveur;
use App\User;
use App\Models\Productions\Demande;
use App\Models\Productions\Acte;
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

    $eleveurInfos->user = $user;
    $eleveurInfos->nbDemandes = $this->nbDemandes($user);
    $eleveurInfos->factureImpayees = $this->factureImpayees($user);
    $eleveurInfos->nbFacturesAEtablir = $this->nbFacturesAEtablir($user);
    $eleveurInfos->troupeaux = $this->troupeaux($user);

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
              ->where('demandes.facturee', 1)
              ->where('factures.payee', 0)
              ->where('demandes.user_id', $user->id)
              ->count();

    return $facturesImpayees;
  }

  /**
   * Calculer le nombre d'analyses à d'actes non encore facturés
   *
   * Undocumented function long description
   *
   * @param type $user utilisateur
   * @return return integer
   */
  public function nbFacturesAEtablir($user)
  {
    $nbDemandesAFacturer = Demande::where('userfact_id', $user->id)
                                  ->where('envoye', 1)
                                  ->where('facturee', 0)
                                  ->count();

    $nbActesAFacturer = Acte::where('user_id', $user->id)
                                  ->where('facturee', 0)
                                  ->count();

    $nbFacturesAEtablir = $nbDemandesAFacturer + $nbActesAFacturer;

    return $nbFacturesAEtablir;
  }


  public function eleveurFormatNumber($user)
  {

    if($user->eleveur != null) {

      $user->eleveur->num = $this->numAvecEspace($user->eleveur->num);

      $user->eleveur->tel = $this->telAvecEspace($user->eleveur->tel);

    }

    return $user;

  }

  public function troupeaux($user)
  {
    $troupeaux = Troupeau::where('user_id', $user->id)->get();
    log::info($troupeaux);

    return $troupeaux;
  }

  /*
  Si un éleveur n'existe pas dans la table éleveurs mais est présent dans la
  table user, il faut lui donner une existence
   */
  public function eleveurNul($user)
  {
    if($user->eleveur == null) {

      $nouvel_eleveur = new Eleveur();

      $nouvel_eleveur->user_id = $user->id;
      $nouvel_eleveur->num = '';
      $nouvel_eleveur->address_1 = '';
      $nouvel_eleveur->address_2 = '';
      $nouvel_eleveur->cp = '';
      $nouvel_eleveur->commune = '';
      $nouvel_eleveur->tel = '';

      $nouvel_eleveur->save();

      $user = User::find($user->id);

    }

    return $user;
  }
}
