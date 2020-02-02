<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Models\Productions\Serie;

use App\Http\Traits\FormatDate;

/**
 *  FOURNIT LES DATAS POUR L'AFFICHAGE DE LA LISTE DES DEMANDES DANS index.blade.php
 */
class ListeSeriesFournisseur extends ListeFournisseur
{

  use FormatDate;

  public function creeliste($series)
  {
    $this->liste = collect();

    foreach ($series as $serie) {

      $description = [];

      $eleveur = $this->lienFactory($serie->user->id, ucfirst($serie->user->name), 'eleveurAdmin.show', "Cliquer pour afficher le détail de cet éleveur");

      $analyse = $this->lienFactory($serie->id, $serie->anapack->nom, 'serie.show', "Cliquer pour afficher le détail de cette analyse");


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
