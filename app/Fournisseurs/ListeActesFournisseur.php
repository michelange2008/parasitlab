<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Http\Traits\FormatDate;

/**
 *  FOURNIT LES DATAS POUR L'AFFICHAGE DE LA LISTE DES DEMANDES DANS index.blade.php
 */
class ListeActesFournisseur extends ListeFournisseur
{

  use FormatDate;

  public function creeliste($actes)
  {
    $this->liste = collect();

    foreach ($actes as $acte) {

      $description = [];

      $eleveur = $this->lienFactory($acte->user->id, ucfirst($acte->user->name), 'eleveurAdmin.show', "Cliquer pour afficher le détail de cet éleveur");

      $acte_nom = $this->lienFactory($acte->id, $acte->anaacte->nom, 'acte.show', ucfirst($acte->anaacte->description));

      $nombre = $this->itemFactory($acte->nombre);

      $facturee = $this->ouinonFactory($acte->id, $acte->facturee);

      $creation = $this->itemFactory($this->dateSortable($acte->updated_at->toDateTimeString()));

      if ($acte->facturee) {

        $facture_id = $this->lienFactory($acte->facture->id, "n°".$acte->facture->id, 'home', "Cliquer pour afficher cette facture");

      }

      else {

        $facture_id = $this->itemFactory(" - ");

      }

      $suppr = $this->delFactory($acte->id, 'acte.destroy');

      $description = [
        $eleveur,
        $acte_nom,
        $nombre,
        $creation,
        $facturee,
        $facture_id,
        $suppr,
      ];

      $this->liste->put($acte->id, $description);
    }

    return $this->liste;

  }
}
