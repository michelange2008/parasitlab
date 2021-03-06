<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

/**
 *  FOURNIT LES DATAS POUR L'AFFICHAGE DE LA LISTE DES DEMANDES DANS index.blade.php
 */
class ListeActesFournisseur extends ListeFournisseur
{

  public function creeliste($actes)
  {
    $this->liste = collect();
    foreach ($actes as $acte) {

      $description = [];

      if (!null == $acte->user) {
        // code...
        $eleveur = $this->lienFactory($acte->user->id, ucfirst($acte->user->name), 'eleveurAdmin.show', 'affiche_detail_eleveur');

      } else {

        $eleveur = "";

      }


      $acte_nom = $this->lienFactory($acte->id, $acte->anaacte->nom, 'acte.show', ucfirst($acte->anaacte->description));

      $nombre = $this->itemFactory($acte->nombre);

      $facturee = $this->ouinonFactory($acte->id, $acte->facturee);

      $creation = $this->dateFactory($acte->updated_at);

      if ($acte->facturee) {

        $facture_id = $this->lienFactory($acte->facture->id, "n°".$acte->facture->id, 'factures.index', 'affiche_facture');

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
