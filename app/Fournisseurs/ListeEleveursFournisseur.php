<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Models\Eleveur;

use App\Http\Traits\FormatNum;
/**
 * FOURNIT UNE LISTE DES ELEVEURS POUR LA VUE TABLEAU INDEX
 */
class ListeEleveursFournisseur extends ListeFournisseur
{

  use FormatNum;

    public function creeListe($eleveurs)
    {

      $this->liste = collect();

      foreach ($eleveurs as $eleveur) {

        $description = [];

        $nom = $this->itemFactory('lien', $eleveur->user->id, $eleveur->user->name, 'eleveurAdmin.show');

        $email = $this->itemFactory(null, null, $eleveur->user->email, null);

        $num = $this->itemFactory(null, null, $this->numAvecEspace($eleveur->num) ,null);

        $cp = $this->itemFactory(null, null, $eleveur->cp, null);

        $commune = $this->itemFactory(null, null, $eleveur->commune, null);

        $tel = $this->itemFactory(null, null, $this->telAvecEspace($eleveur->tel), null);

        $veto = $this->itemFactory('lien', $eleveur->veto->user->id, $eleveur->veto->user->name,'vetoAdmin.show');

        $suppr = $this->itemFactory('del', $eleveur->user->id, null, 'eleveurAdmin.destroy');

        $description = [
          $nom,
          $email,
          $num,
          $cp,
          $commune,
          $tel,
          $veto,
          $suppr,
        ];

        $this->liste->put($eleveur->id , $description);


      }

      return $this->liste;

    }

}
