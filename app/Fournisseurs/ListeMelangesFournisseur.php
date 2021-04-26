<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Models\Eleveur;

use App\Http\Traits\FormatNum;
/**
 * FOURNIT UNE LISTE DES ANIMAUX POUR LA VUE TABLEAU INDEX
 *
 */
class ListeMelangesFournisseur extends ListeFournisseur
{

  use FormatNum;

    public function creeListe($prelevements_melange)
    {

      $this->liste = collect();

      foreach ($prelevements_melange as $prelevement_melange) {

        $description = [];

        $nom = $this->lienFactory($prelevement_melange->melange->id, $prelevement_melange->melange->nom, 'melange.edit', 'affiche_melange');

        $animaux = $this->ouinonFactory($prelevement_melange->melange->id, $prelevement_melange->melange->animaux);

        $espece = $this->iconeFactory($prelevement_melange->demande->espece->icone);

        $user = $this->lienFactory($prelevement_melange->demande->user->id, $prelevement_melange->demande->user->name, 'user.show', 'affiche_user');

        $date_demande = $this->dateFactory($prelevement_melange->demande->date_reception);

        $demande = $this->lienFactory($prelevement_melange->demande->id, 'n°'.$prelevement_melange->demande->id, 'demandes.show', 'affiche_demande');

        $description = [
          $nom,
          $animaux,
          $espece,
          $user,
          $demande,
          $date_demande,
        ];

        $this->liste->put($prelevement_melange->id , $description);


      }

      return $this->liste;

    }

}
