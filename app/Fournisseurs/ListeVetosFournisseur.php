<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Models\Veto;

use App\Http\Traits\FormatNum;

/**
 * FOURNIT LA LISTE DES VETOS AVEC TOUTES LES INFOS NECESSAIRES FORMATTEES POUR LES AFFICHER DANS INDEX
 */
class ListeVetosFournisseur extends ListeFournisseur
{

  use FormatNum;

  public function creeListe($users)
  {
    $this->liste = collect();

    foreach ($users as $user) {

      $description = [];
      // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)
      $nom = $this->lienFactory($user->id, $user->name, 'vetoAdmin.show', "Cliquer pour afficher ce vétérinaire");

      $email = $this->itemFactory($user->email);

      $num = $this->itemFactory($this->numAvecEspace($user->veto->num));

      $cp = $this->itemFactory($user->veto->cp);

      $tel = $this->itemFactory($this->telAvecEspace($user->veto->tel));
// TODO: LA SUPPRESSION SE FAIT PAS LE USER ET PAR LE VETO OU LE LABO OU L'ELEVEUR
      $suppr = $this->delFactory($user->id, 'vetoAdmin.destroy');

      $description = [
        $nom,
        $email,
        $num,
        $cp,
        $tel,
        $suppr,
      ];

      $this->liste->put($user->veto->id , $description);

    }

    return $this->liste;
  }
}
