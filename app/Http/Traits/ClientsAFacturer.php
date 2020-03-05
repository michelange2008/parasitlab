<?php
namespace App\Http\Traits;

use App\Models\Productions\Demande;
use App\Models\Productions\Acte;
use App\Models\Veto;

/**
 * Permet d'extraire le
 */
trait ClientsAFacturer
{
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
}
