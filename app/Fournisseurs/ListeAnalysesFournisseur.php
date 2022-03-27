<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\User;

/**
 * FOURNIT LA LISTE DES VETOS AVEC TOUTES LES INFOS NECESSAIRES FORMATTEES POUR LES AFFICHER DANS INDEX
 */
class ListeAnalysesFournisseur extends ListeFournisseur
{

  public function creeListe($analyses)
  {
    $this->liste = collect();

    foreach ($analyses as $analyse) {

      $description = [];
      // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)
      $icone = $this->iconeFactory($analyse->icone);

      $nom = $this->lienFactory($analyse->id, $analyse->nom, 'analyses.edit', 'edit_analyse');

      $espece = $this->iconeFactory($analyse->espece->icone);

      $type = $this->lienFactory($analyse->anatype->id, $analyse->anatype->nom, 'anatypes.edit', 'affiche_detail_type');

      $suppr = $this->delFactory($analyse->id, 'analyses.destroy');

      $description = [
        $icone,
        $nom,
        $espece,
        $type,
        $suppr,
      ];

      $this->liste->put($analyse->id , $description);

    }

    return $this->liste;
  }
}
