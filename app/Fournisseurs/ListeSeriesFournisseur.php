<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Models\Productions\Serie;

/**
 *  FOURNIT LES DATAS POUR L'AFFICHAGE DE LA LISTE DES DEMANDES DANS index.blade.php
 */
class ListeSeriesFournisseur extends ListeFournisseur
{

  public function creeliste($series)
  {
    $this->liste = collect();

    foreach ($series as $serie) {

      $description = [];

      $eleveur = $this->lienFactory($serie->user->id, ucfirst($serie->user->name), 'eleveurAdmin.show', 'affiche_detail_eleveur');

      $analyse = $this->lienFactory($serie->id, $this->acteTypeCourt($serie->anaacte), 'serie.show', 'affiche_detail_analyse');


      $espece = $this->iconeFactory($serie->espece->icone);

      $terminee = $this->ouinonFactory($serie->id, $serie->acheve);

      $description = [
        $eleveur,
        $analyse,
        $espece,
        $terminee,
      ];

      $this->liste->put($serie->id, $description);
    }

    return $this->liste;

  }
}
