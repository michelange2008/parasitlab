<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\User;

/**
 * FOURNIT LA LISTE DES VETOS AVEC TOUTES LES INFOS NECESSAIRES FORMATTEES POUR LES AFFICHER DANS INDEX
 */
class ListeAnaactesFournisseur extends ListeFournisseur
{

  public function creeListe($elements)
  {
    $this->liste = collect();

    foreach ($elements as $element) {

      $description = [];
      // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)
      $icone = $this->iconeFactory($element->icone);

      $nom = $this->lienFactory($element->id, $element->nom, 'anaactes.edit','Cliquer pour modifier cet acte');

      $detail = $this->itemFactory($element->id, $element->description);

      $pu_ht = $this->itemFactory($element->id, $element->pu_ht);

      $tva = $this->itemFactory($element->id, $element->tva->taux);

      $suppr = $this->delFactory($element->id, 'analyses.destroy');

      $description = [
        $icone,
        $nom,
        $detail,
        $pu_ht,
        $tva,
        $suppr,
      ];

      $this->liste->put($element->id , $description);

    }

    return $this->liste;

  }
}
