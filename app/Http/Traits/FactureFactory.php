<?php
namespace App\Http\Traits;

use App\Models\Productions\Demande;
use App\Models\Productions\Acte;
use App\Models\Veto;
use App\Models\Productions\Anaacte_Facture;

/**
 * Permet d'extraire le
 */
trait FactureFactory
{
  /**
  * Méthode pour la liste des users qui ont de demandes non facturées (manipulation due au fait que certaines demandes d'analyses ne sont pas à facturer au propriétaire des animaux)
  *
  * return collection avec une liste d'id utilisateurs ayant chacun une liste de demande_id
  */
  function clientsDemandesAFacturer()
  {
    $demandes_non_facturees = Demande::select('id','user_id', 'veto_id', 'user_dest_fact')->where('facturee', false)->get();

    // Manipulation pour associer au user_id le destinatire de la facture
    $udnf = Collect();

    foreach ($demandes_non_facturees as $demande_non_facturee) {

      if(!$demande_non_facturee->user_dest_fact && $demande_non_facturee->veto_id !== null) { // si l'éleveur n'est pas le destinaire de la facture et qu'il y a un veto_id

        $dest_fact_id = Veto::find($demande_non_facturee->veto_id); // le user_id prend la veleur du veto user_id

        $demande_non_facturee->user_id = $dest_fact_id->user_id;
      }

      $udnf->push(["user_id" => $demande_non_facturee->user_id, "demande_id" => $demande_non_facturee->id]);

    }
    $users_dnf = $udnf->mapToGroups(function ($item, $key) {
        return [$item['user_id'] => $item['demande_id']];
    });

    return $users_dnf;
  }

  /**
  * Methode identique mais pour les actes: c'est plus simple car le user de l'acte est aussi le destinataire de facture
  *
  * return: un tableau identique au précédent mais avec les acte_id au lieu des demande_id
  */

  public function clientsActesAFacturer()
  {
    $actes_non_factures = Acte::select('id','user_id')->where('facturee', false)->get();

    $uanf = Collect();

    foreach ($actes_non_factures as $acte_non_facture) {

      $uanf->push(["user_id" => $acte_non_facture->user_id, "acte_id" => $acte_non_facture->id]);

    }

    $users_anf = $uanf->mapToGroups(function ($item, $key) {
        return [$item['user_id'] => $item['acte_id']];
    });

    return $users_anf;
  }

  public function calculSommeFacture($facture)
  {
    $somme_facture = Collect();

    $somme_facture->total_ht = 0;
    $somme_facture->total_ttc = 0;
    $total_ht = 0;
    $total_ttc = 0;
    $anaactes_factures = Anaacte_Facture::where('facture_id', $facture->id)->get();

    foreach ($anaactes_factures as $anaacte_facture) {

      $total_ht += floatval($anaacte_facture->pu_ht) * $anaacte_facture->nombre;

      $total_ttc += $anaacte_facture->pu_ht * $anaacte_facture->nombre * ( 1 + $anaacte_facture->tva->taux );

    }

    $somme_facture->total_ht = number_format($total_ht, 2, ",", " ")." €";
    $somme_facture->total_ttc = number_format($total_ttc, 2, ",", " ")." €";

    return $somme_facture;
  }
}
