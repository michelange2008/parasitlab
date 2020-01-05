<?php
namespace App\Http\Traits;

use App\Models\Productions\Facture;
use Carbon\Carbon;

/**
 * Ensemble de fonction de gestion de l'outil Facture (sous forme de trait car appelé par la classe demande)
 */
trait FactureManager
{

  // Créer et enregistre une facture au moment de la création d'une demande
  public function factureStore($anapack, $user, $facture_usertype_id, $toveto, $user_veto)
  {

    $destinataire_facture = $this->destinataireFacture($user, $facture_usertype_id, $toveto, $user_veto);

    $nouvelle_facture = new Facture;

    $nouvelle_facture->user_id = $destinataire_facture->id;
    $nouvelle_facture->faite = true;
    $nouvelle_facture->total_ht = $this->calcul_facture($anapack)->get('ht');
    $nouvelle_facture->total_ttc = $this->calcul_facture($anapack)->get('ttc');
    $nouvelle_facture->faite_date = Carbon::now();

    $nouvelle_facture->save();

    return $nouvelle_facture;
  }

  public function calcul_facture($anapack)
  {
    $montant_facture = collect(['ht' => 0, 'ttc' => 0]);
    $ttc = 0;
    $ht = 0;
    $actes = $anapack->anaactes;

    foreach ($actes as $acte) {
      $ttc += $acte->pu_ht + $acte->pu_ht * $acte->tva->taux;
      $ht += $acte->pu_ht;
    }
    $montant_facture->put('ht', $ht);

    $montant_facture->put('ttc', $ttc);

    return $montant_facture;
  }

  // Renvoi le destinataire de la facture dans la création d'une demande d'analyse
  function destinataireFacture($user, $facture_usertype_id, $toveto, $user_veto)
  {

    if($toveto) // si on envoie les résultats au véto
    {
      if($facture_usertype_id == $user_veto->user->usertype_id) // et si le destinaire est vétérinaire
      {
        $destinataire_facture = $user_veto->user; // le destinataire de la facture est donc le vétérinaire choisi
      }
      elseif($facture_usertype_id == $user->usertype_id) // mais si le destinataire est l'éleveur demandeur
      {
        $destinataire_facture = $user; // le destinataire de la facture est donc le demandeur
      }
      else {
        $destinataire_facture = auth()->user(); // sinon c'est le laboratoire... donc la personne authentifiée
      }
    }
    else {

      if($facture_usertype_id == $user->usertype_id)
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
