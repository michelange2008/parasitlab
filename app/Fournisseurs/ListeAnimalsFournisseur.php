<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Models\Eleveur;

use App\Http\Traits\FormatNum;
/**
 * FOURNIT UNE LISTE DES ANIMAUX POUR LA VUE TABLEAU INDEX
 *
 */
class ListeAnimalsFournisseur extends ListeFournisseur
{

  use FormatNum;

    public function creeListe($animals)
    {

      $this->liste = collect();

      foreach ($animals as $animal) {

        $description = [];

        $num = $this->lienFactory($animal->id, $animal->numero, 'animal.edit', 'affiche_animal');

        $nom = $this->lienFactory($animal->id, $animal->nom, 'animal.edit', 'affiche_animal');

        $troupeau = $this->itemFactory($animal->troupeau->nom);

        $typeprod = $this->itemFactory($animal->troupeau->typeprod->nom);

        $proprietaire = $this->itemFactory($animal->troupeau->user->name);

        $description = [
          $num,
          $nom,
          $troupeau,
          $typeprod,
          $proprietaire,
        ];

        $this->liste->put($animal->id , $description);


      }

      return $this->liste;

    }

}
