<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\User;

/**
 * FOURNIT LA LISTE DES VETOS AVEC TOUTES LES INFOS NECESSAIRES FORMATTEES POUR LES AFFICHER DANS INDEX
 */
class ListeAnatypesFournisseur extends ListeFournisseur
{

  public function creeListe($anatypes)
  {
    $this->liste = collect();

    foreach ($anatypes as $anatype) {

      $description = [];
      // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)
      $icone = $this->iconeFactory($anatype->icone);

      $id = $this->itemFactory($anatype->id);

      $nom = $this->lienFactory($anatype->id, $anatype->nom, 'anaactes.edit','edit_acte');

      $technique = $this->itemFactory($anatype->technique);

      $suppr = $this->delFactory($anatype->id, 'analyses.destroy');

      $description = [
        $icone,
        $id,
        $nom,
        $technique,
        $suppr,
      ];

      $this->liste->put($anatype->id , $description);

    }

    return $this->liste;

  }
}
