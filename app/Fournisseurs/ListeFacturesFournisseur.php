<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;
/**
 *
 */
class ListeFacturesFournisseur extends ListeFournisseur
{

  public function creeListe($factures)
  {
    $this->liste = collect();

    foreach ($factures as $facture) {

      $description = [];

      $num_facture = $this->lienFactory($facture->id, "n° ".$facture->id, 'factures.show', 'affiche_facture');

      $nom = $this->lienFactory($facture->user_id, $facture->user->name, 'eleveurAdmin.show', 'affiche_eleveur');

      $faite_date = $this->dateFactory($facture->faite_date);

      $total_ht = $this->itemFactory($facture->total_ht);

      $total_ttc = $this->itemFactory($facture->total_ttc);

      if($facture->envoyee_date === null) {

        $envoyee_date = $this->lienFactory($facture->id, __('boutons.send'), 'mail.envoyerFacture', 'envoi_facture', '<i class="fas fa-paper-plane"></i>');

      } else {

        $envoyee_date = $this->dateFactory($facture->envoyee_date);

      }

      $payee = $this->ouinonFactory($facture->facture_id, $facture->payee);

      $reglement = ($facture->reglement_id != null) ? $this->iconeFactory($facture->reglement->modereglement->icone) : " - ";

      $payee_date = ($facture->reglement_id != null) ? $this->dateFactory($facture->reglement->date_reglement) : ' - ';

      $suppr = ($facture->payee) ? "" : $this->delFactory($facture->id, 'factures.destroy');

      $description = [
        $num_facture,
        $nom,
        $faite_date,
        $total_ht,
        $total_ttc,
        $envoyee_date,
        $payee,
        $reglement,
        $payee_date,
        $suppr,
      ];

      $this->liste->put($facture->facture_id, $description);
     }

     return $this->liste;
  }
}
