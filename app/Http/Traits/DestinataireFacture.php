<?php
namespace App\Http\Traits;

use App\Models\Usertype;

/**
 * Renvoi le destinataire de la facture dans la création d'une demande d'analyse
 */
trait DestinataireFacture
{

  function destinataireFacture($user, $datas)
  {

    $facture_usertype = Usertype::where('code', $datas['facture'])->first();

    if(isset($datas['toveto'])) // si on envoie les résultats au véto
    {
      if($facture_usertype->id === $user_veto->usertype_id) // et si le destinaire est vétérinaire
      {
        $destinataire_facture = $user_veto; // le destinataire de la facture est donc le vétérinaire choisi
      }
      elseif($facture_usertype->id === $user->usertype_id) // mais si le destinataire est l'éleveur demandeur
      {
        $destinataire_facture = $user; // le destinataire de la facture est donc le demandeur
      }
      else {
        $destinataire_facture = auth()->user(); // sinon c'est le laboratoire... donc la personne authentifiée
      }
    }
    else {
      if($facture_usertype->id === $user->usertype_id)
      {
        $destinataire_facture = $user;
      }
      else {
        $destinataire_facture = auth()->user();
      }
    }
    return $destinataire_facture;
  }
}
