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

  public function creeListe($vetos)
  {
    $this->liste = collect();

    foreach ($vetos as $veto) {

      $description = [];
      // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)
      $nom = $this->lienFactory($veto->user->id, $veto->user->name, 'vetoAdmin.show', "Cliquer pour afficher ce vétérinaire");

      $email = $this->itemFactory($veto->user->email);

      $num = $this->itemFactory($this->numAvecEspace($veto->num));

      $cp = $this->itemFactory($veto->cp);

      $tel = $this->itemFactory($this->telAvecEspace($veto->tel));

      $suppr = $this->delFactory($veto->user->id, 'vetoAdmin.destroy');

      $description = [
        $nom,
        $email,
        $num,
        $cp,
        $tel,
        $suppr,
      ];

      $this->liste->put($veto->id , $description);

    }

    return $this->liste;
  }
}
