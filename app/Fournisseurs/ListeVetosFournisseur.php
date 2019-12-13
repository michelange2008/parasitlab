<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Models\Veto;

use App\Http\Traits\FormatCro;
use App\Http\Traits\FormatTel;

/**
 * FOURNIT LA LISTE DES VETOS AVEC TOUTES LES INFOS NECESSAIRES FORMATTEES POUR LES AFFICHER DANS INDEX
 */
class ListeVetosFournisseur extends ListeFournisseur
{

  use FormatCro, FormatTel;

  public function creeListe($vetos)
  {
    $this->liste = collect();

    foreach ($vetos as $veto) {

      $description = [];
      // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)
      $nom = $this->itemFactory('lien', $veto->user->id, $veto->user->name, 'vetoAdmin.show');

      $email = $this->itemFactory(null, null, $veto->user->email, null);

      $cro = $this->itemFactory(null, null, $this->croAvecEspace($veto->cro) ,null);

      $cp = $this->itemFactory(null, null, $veto->cp, null);

      $tel = $this->itemFactory(null, null, $this->telAvecEspace($veto->tel), null);

      $suppr = $this->itemFactory('del', $veto->user->id, null, 'vetoAdmin.destroy');

      $description = [
        $nom,
        $email,
        $cro,
        $cp,
        $tel,
        $suppr,
      ];

      $this->liste->put($veto->id , $description);

    }

    return $this->liste;
  }
}
