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
      $eleveur = $this->lienFactory($troupeau->user_id, $troupeau->user->name, 'user.show', 'affiche_user');

      $nom = $this->lienFactory($troupeau->id, $troupeau->nom, 'troupeau.show', 'affiche_troupeau');

      $typeprod = $this->itemFactory($troupeau->typeprod->nom);

      $espece = $this->itemFactory($troupeau->espece->nom);

      $effectif = $this->itemFactory($troupeau->animals->count());

      $edit = $this->modifierFactory($troupeau->id, 'troupeau.edit');

      $suppr = $this->delFactory($troupeau->id, 'troupeau.destroy');

      $description = [
        $nom,
        $eleveur,
        $espece,
        $typeprod,
        $effectif,
        $edit,
        $suppr,
      ];

      $this->liste->put($troupeau->id , $description);

    }

    return $this->liste;
  }
}
