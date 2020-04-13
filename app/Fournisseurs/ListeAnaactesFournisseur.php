<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\User;

/**
 * FOURNIT LA LISTE DES VETOS AVEC TOUTES LES INFOS NECESSAIRES FORMATTEES POUR LES AFFICHER DANS INDEX
 */
class ListeAnaactesFournisseur extends ListeFournisseur
{

  public function creeListe($anaactes)
  {
    $this->liste = collect();

    foreach ($anaactes as $anaacte) {

      $description = [];
      // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)
      $icone = $this->iconeFactory($anaacte->anatype->icone);


      $id = $this->itemFactory($anaacte->id);

      $nom = $this->lienFactory($anaacte->id, $this->acteTypeCourt($anaacte), 'anaactes.edit', 'edit_acte');

      $detail = $this->itemFactory($anaacte->description);

      $pu_ht = $this->itemFactory($anaacte->pu_ht);

      $tva = $this->itemFactory($anaacte->tva->taux);

      $suppr = $this->delFactory($anaacte->id, 'analyses.destroy');

      $description = [
        $icone,
        $id,
        $nom,
        $detail,
        $pu_ht,
        $tva,
        $suppr,
      ];

      $this->liste->put($anaacte->id , $description);

    }

    return $this->liste;

  }
}
