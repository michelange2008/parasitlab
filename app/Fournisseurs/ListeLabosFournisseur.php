<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

/**
 * FOURNIT LA LISTE DES VETOS AVEC TOUTES LES INFOS NECESSAIRES FORMATTEES POUR LES AFFICHER DANS INDEX
 */
class ListeLabosFournisseur extends ListeFournisseur
{

  public function creeListe($users)
  {
    $this->liste = collect();

    foreach ($users as $user) {

      $description = [];

      // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)

      $photo = $this->photoFactory($user->labo->photo);

      $nom = $this->lienFactory($user->id, ucfirst($user->name), 'routeurDemande, "Cliquer pour voir cet utilisateur");

      $email = $this->itemFactory($user->email);

      $fonction = $this->itemFactory($user->labo->fonction);

      $modifier = $this->modifierFactory($user->id, 'user.edit');

      $suppr = $this->delFactory($user->id, 'laboAdmin.destroy');

      $description = [
        $photo,
        $nom,
        $email,
        $fonction,
        $modifier,
        $suppr,
      ];

      $this->liste->put($user->labo->id , $description);

    }

    return $this->liste;
  }
}
