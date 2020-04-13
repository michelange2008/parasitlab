<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\User;

/**
 * FOURNIT LA LISTE DES VETOS AVEC TOUTES LES INFOS NECESSAIRES FORMATTEES POUR LES AFFICHER DANS INDEX
 */
class ListeAnalysesFournisseur extends ListeFournisseur
{

  public function creeListe($anaactes)
  {
    $this->liste = collect();

    foreach ($anaactes as $anaacte) {

      $description = [];
      // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)
      $icone = $this->iconeFactory($anaacte->icone);

      $anatype = $this->itemFactory($anaacte->anatype->nom);

      $nom = $this->lienFactory($anaacte->id, $anaacte->nom, 'analyses.edit', 'edit_analyse');

      $espece = $this->iconeFactory($anaacte->espece->icone);

      $acte = $this->lienFactory($anaacte->anaacte->id, $anaacte->anaacte->nom, 'anaactes.show', 'affiche_detail_acte');

      $suppr = $this->delFactory($anaacte->id, 'analyses.destroy');

      $description = [
        $icone,
        $anatype,
        $nom,
        $espece,
        $acte,
        $suppr,
      ];

      $this->liste->put($anaacte->id , $description);

    }

    return $this->liste;
  }
}
