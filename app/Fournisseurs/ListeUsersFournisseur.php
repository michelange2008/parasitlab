<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\User;

/**
 * FOURNIT LA LISTE DES VETOS AVEC TOUTES LES INFOS NECESSAIRES FORMATTEES POUR LES AFFICHER DANS INDEX
 */
class ListeUsersFournisseur extends ListeFournisseur
{

  public function creeListe($users)
  {
    $this->liste = collect();

    foreach ($users as $user) {

      $description = [];
      // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)
      $icone = $this->itemFactory('icone', $user->userType->icone->id, $user->userType->icone->nom, null);

      $nom = $this->itemFactory('lien', $user->id, $user->name, 'user.show');

      $email = $this->itemFactory(null, null, $user->email, null);

      $userType = $this->itemFactory(null, null, $user->userType->nom, null);

      $suppr = $this->itemFactory('del', $user->id, null, 'user.destroy');

      $description = [
        $icone,
        $nom,
        $email,
        $userType,
        $suppr,
      ];

      $this->liste->put($user->id , $description);

    }

    return $this->liste;
  }
}
