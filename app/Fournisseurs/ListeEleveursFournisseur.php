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

        $nom = $this->lienFactory($eleveur->user->id, $eleveur->user->name, 'eleveurAdmin.show', "Cliquer pour afficher cet éleveur");

        $email = $this->itemFactory($eleveur->user->email);

        $num = $this->itemFactory($this->numAvecEspace($eleveur->num));

        $cp = $this->itemFactory($eleveur->cp);

        $commune = $this->itemFactory($eleveur->commune);

        $tel = $this->itemFactory($this->telAvecEspace($eleveur->tel));

        $veto = $this->lienFactory($eleveur->veto->user->id, $eleveur->veto->user->name,'vetoAdmin.show', "CLiquer pour afficher ce vétérinaire");

        $suppr = $this->delFactory($eleveur->user->id, 'eleveurAdmin.destroy');

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
