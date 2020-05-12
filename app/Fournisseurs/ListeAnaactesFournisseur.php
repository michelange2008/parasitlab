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
    $prec = '';
    foreach ($anaactes as $anaacte) {

      $description = [];
      // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)
      $icone = $this->iconeFactory($anaacte->anatype->icone);

      $num = $this->itemFactory($anaacte->num);

      if($anaacte->anatype->id == $prec) {

        $type = $this->itemFactory('-');

      } else {

        $type = $this->itemFactory($anaacte->anatype->nom);
      }

      $prec = $anaacte->anatype->id;

      $acte = $this->lienFactory($anaacte->id, $anaacte->nom, 'anaactes.edit', 'edit.anaacte');

      $pu_ht = $this->itemFactory($anaacte->pu_ht);

      $tva = $this->itemFactory($anaacte->tva->taux);

      $suppr = $this->delFactory($anaacte->id, 'analyses.destroy');

      $description = [
        $icone,
        $num,
        $type,
        $acte,
        $pu_ht,
        $tva,
        $suppr,
      ];

      $this->liste->put($anaacte->id , $description);

    }

    return $this->liste;

  }
}
