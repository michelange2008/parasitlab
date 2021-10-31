<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Models\Eleveur;

use App\Http\Traits\FormatNum;
/**
 * FOURNIT UNE LISTE DES ANIMAUX POUR LA VUE TABLEAU INDEX
 *
 */
class ListeEspecesFournisseur extends ListeFournisseur
{

  use FormatNum;

    public function creeListe($especes)
    {

      $this->liste = collect();

      foreach ($especes as $espece) {

        $description = [];

        $nom = $this->lienFactory($espece->id, $espece->nom, 'espece.edit', 'affiche_espece');

        $abbreviation = $this->itemFactory($espece->abbreviation);

        $icone = $this->iconeFactory($espece->icone);

        $suppr = $this->delFactory($espece->id, 'espece.destroy');

        $description = [
          $nom,
          $abbreviation,
          $icone,
          $suppr,
        ];

        $this->liste->put($espece->id , $description);


      }

      return $this->liste;

    }

}
