<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;
use App\Http\Traits\FormatDate;

/**
 *
 */
class ListeFacturesFournisseur extends ListeFournisseur
{

  use FormatDate;

  public function creeListe($factures)
  {
    $this->liste = collect();

    foreach ($factures as $facture) {

      $description = [];

      $num_facture = $this->lienFactory($facture->id, "n° ".$facture->id, 'factures.show', 'Cliquer pour afficher le détail de cette facture');

      $nom = $this->lienFactory($facture->user_id, $facture->user->name, 'eleveurAdmin.show', "Cliquer pour afficher cet éleveur");

      $faite_date = $this->itemFactory($this->dateSortable($facture->faite_date));

      $total_ht = $this->itemFactory($facture->total_ht);

      $total_ttc = $this->itemFactory($facture->total_ttc);

      $envoyee_date = $this->itemFactory($this->dateSortable($facture->envoyee_date));

      $payee = $this->ouinonFactory($facture->facture_id, $facture->payee);

      $reglement = ($facture->reglement != null) ? $this->iconeFactory($facture->reglement->icone) : " - ";

      $payee_date = $this->itemFactory($this->dateSortable($facture->payee_date));

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
