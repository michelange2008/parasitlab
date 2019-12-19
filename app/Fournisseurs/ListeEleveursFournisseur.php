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

    public function creeListe($users)
    {

      $this->liste = collect();

      foreach ($users as $user) {

        $description = [];

        $nom = $this->lienFactory($user->id, $user->name, 'eleveurAdmin.show', "Cliquer pour afficher cet éleveur");

        $email = $this->itemFactory($user->email);

        $num = $this->itemFactory($this->numAvecEspace($user->eleveur->num));

        $cp = $this->itemFactory($user->eleveur->cp);

        $commune = $this->itemFactory($user->eleveur->commune);

        $tel = $this->itemFactory($this->telAvecEspace($user->eleveur->tel));

        $veto = $this->lienFactory($user->eleveur->veto->user->id, $user->eleveur->veto->user->name,'vetoAdmin.show', "CLiquer pour afficher ce vétérinaire");

        $suppr = $this->delFactory($user->id, 'eleveurAdmin.destroy');

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

        $this->liste->put($user->eleveur->id , $description);


      }

      return $this->liste;

    }

}
