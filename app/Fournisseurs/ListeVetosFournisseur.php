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
      $nom = $this->itemFactory('lien', $veto->user->id, $veto->user->name, 'vetoAdmin.show');

      $email = $this->itemFactory(null, null, $veto->user->email, null);

      $num = $this->itemFactory(null, null, $this->numAvecEspace($veto->num) ,null);

      $cp = $this->itemFactory(null, null, $veto->cp, null);

      $tel = $this->itemFactory(null, null, $this->telAvecEspace($veto->tel), null);

      $suppr = $this->itemFactory('del', $veto->user->id, null, 'vetoAdmin.destroy');

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
