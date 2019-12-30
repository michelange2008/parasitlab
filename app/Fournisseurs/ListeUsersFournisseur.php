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
      $icone = $this->iconeFactory($user->userType->icone);

      $nom = $this->lienFactory($user->id, ucfirst($user->name), 'user.show', "Cliquer pour voir cet utilisateur");

      $email = $this->itemFactory($user->email);

      $userType = $this->lienFactory($user->userType->id, $user->userType->nom, $user->usertype->code.'Admin.index', "Cliquer pour voir tous les utilisateurs de ce type");

      $modifier = $this->modifierFactory($user->id, 'user.edit');

      $suppr = $this->delFactory($user->id, 'user.destroy');

      $description = [
        $icone,
        $nom,
        $email,
        $userType,
        $modifier,
        $suppr,
      ];

      $this->liste->put($user->id , $description);

    }

    return $this->liste;
  }
}
