<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\User;

/**
 * FOURNIT LA LISTE DES VETOS AVEC TOUTES LES INFOS NECESSAIRES FORMATTEES POUR LES AFFICHER DANS INDEX
 */
class ListeAnaitemsFournisseur extends ListeFournisseur
{

  public function creeListe($anaitems)
  {
    $this->liste = collect();

    foreach ($anaitems as $anaitem) {

      $description = [];
      // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)
      $image = $this->photoFactory('icones/oeufs/'.$anaitem->image);

      $abbreviation = $this->itemFactory($anaitem->abbreviation);

      $nom = $this->lienFactory($anaitem->id, $anaitem->nom, 'anaitems.edit', 'edit_anaitem');

      $type_unite = $this->itemFactory($anaitem->unite->type);

      $unite = $this->itemFactory($anaitem->unite->nom);

      $valeur = $this->itemFactory($anaitem->qtt->nom);

      $multiple = $this->itemFactory($anaitem->multiple);

      $suppr = $this->delFactory($anaitem->id, 'anaitems.destroy');

      $description = [
        $image,
        $abbreviation,
        $nom,
        $type_unite,
        $unite,
        $valeur,
        $multiple,
        $suppr,
      ];

      $this->liste->put($anaitem->id , $description);

    }

    return $this->liste;

  }
}
