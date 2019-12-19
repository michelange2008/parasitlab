<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\User;

/**
 * FOURNIT LA LISTE DES VETOS AVEC TOUTES LES INFOS NECESSAIRES FORMATTEES POUR LES AFFICHER DANS INDEX
 */
class ListeAnalysesFournisseur extends ListeFournisseur
{

  public function creeListe($elements)
  {
    $this->liste = collect();

    foreach ($elements as $element) {

      $description = [];
      // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)
      $icone = $this->iconeFactory($element->icone);

      $nom = $this->lienFactory($element->id, $element->nom, 'analyses.edit', "Cliquer pour modifier cette analyse");

      $espece = $this->iconeFactory($element->espece->icone);

      $acte = $this->lienFactory($element->anaacte->id, $element->anaacte->nom, 'anaactes.show', "Cliquer pour afficher la liste des actes");

      $suppr = $this->delFactory($element->id, 'analyses.destroy');

      $description = [
        $icone,
        $nom,
        $espece,
        $acte,
        $suppr,
      ];

      $this->liste->put($element->id , $description);

    }

    return $this->liste;
  }
}
