<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Models\Productions\Prelevement;

use App\Models\Eleveur;

use App\Http\Traits\FormatNum;
/**
 * FOURNIT UNE LISTE DES ANIMAUX POUR LA VUE TABLEAU INDEX
 *
 */
class ListeMelangesFournisseur extends ListeFournisseur
{

  use FormatNum;

    public function creeListe($melanges)
    {

      $this->liste = collect();

      foreach ($melanges as $melange) {

        $prelevement = Prelevement::where('melange_id', $melange->id)->first();



        $description = [];

        $nom = $this->lienFactory($melange->id, $melange->nom, 'melange.edit', 'affiche_melange');

        $animaux = $this->ouinonFactory($melange->id, $melange->animaux);

        $espece = $this->iconeFactory($melange->troupeau->espece->icone);

        $user = $this->lienFactory($melange->troupeau->user->id, $melange->troupeau->user->name, 'user.show', 'affiche_user');

        if($prelevement !== null) {

          $date_demande = $this->dateFactory($prelevement->demande->date_reception);

          $demande = $this->lienFactory($prelevement->demande->id, 'n°'.$prelevement->demande->id, 'demandes.show', 'affiche_demande');

          $suppr = $this->itemFactory('-');

        } else {

          $date_demande = $this->itemFactory('-');

          $demande = $this->itemFactory('-');

          $suppr = $this->delFactory($melange->id, 'melange.destroy');

        }

        $description = [
          $nom,
          $animaux,
          $espece,
          $user,
          $demande,
          $date_demande,
          $suppr,
        ];

        $this->liste->put($melange->id , $description);


      }

      return $this->liste;

    }

}
