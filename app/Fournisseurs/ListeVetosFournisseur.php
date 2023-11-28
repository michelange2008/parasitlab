<?php

namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Models\Veto;

use App\Http\Traits\FormatNum;
use Illuminate\Support\Collection;

/**
 * FOURNIT LA LISTE DES VETOS AVEC TOUTES LES INFOS NECESSAIRES FORMATTEES POUR LES AFFICHER DANS INDEX
 */
class ListeVetosFournisseur extends ListeFournisseur
{

  use FormatNum;

  protected Collection $liste;

  public function creeListe($users)
  {
    $this->liste = collect();

    foreach ($users as $user) {

      if ($user->veto == null) {
        $veto = new Veto();
        $veto->user_id = $user->id;
        $veto->address_1 = "à compléter";
        $veto->cp = "00000";
        $veto->commune = "à compléter";
        $veto->tel = "0000000000";
        
        $veto->save();
      }

        $description = [];
        // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)
        $nom = $this->lienFactory($user->id, $user->name, 'vetoAdmin.show', 'affiche_veto');

        $email = $this->itemFactory($user->email);

        $num = $this->itemFactory($this->numAvecEspace($user->veto->num));

        $cp = $this->itemFactory($user->veto->cp);

        $commune = $this->itemFactory($user->veto->commune);

        $tel = $this->itemFactory($this->telAvecEspace($user->veto->tel));

        $suppr = $this->delFactory($user->id, 'vetoAdmin.destroy');

        $description = [
          $nom,
          $email,
          $cp,
          $commune,
          $tel,
          $suppr,
        ];

        $this->liste->put($user->veto->id, $description);
      }
    return $this->liste;
  }
}
