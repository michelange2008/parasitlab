<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Models\Troupeau;

use App\Http\Traits\FormatNum;

/**
 * FOURNIT LA LISTE DES VETOS AVEC TOUTES LES INFOS NECESSAIRES FORMATTEES POUR LES AFFICHER DANS INDEX
 */
class ListeTroupeausFournisseur extends ListeFournisseur
{

  public function creeListe($troupeaus)
  {
    $this->liste = collect();

    foreach ($troupeaus as $troupeau) {

      $description = [];
      // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)
      $nom = $this->lienFactory($troupeau->id, $troupeau->nom, 'troupeau.show', 'affiche_troupeau');

      $eleveur = $this->lienFactory($troupeau->user_id, $troupeau->user_id, 'user.show', 'affiche_user');

      $typeprod = $this->itemFactory($troupeau->typeprod->nom);

      $espece = $this->itemFactory($troupeau->typeprod->espece->nom);

      $suppr = $this->delFactory($troupeau->id, 'troupeau.destroy');

      $description = [
        $nom,
        $eleveur,
        $typeprod,
        $espece,
        $suppr,
      ];

      $this->liste->put($troupeau->id , $description);

    }

    return $this->liste;
  }
}
