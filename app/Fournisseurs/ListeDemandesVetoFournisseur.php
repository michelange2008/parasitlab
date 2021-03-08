<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Models\Productions\Demande;

/**
 *  FOURNIT LES DATAS POUR L'AFFICHAGE DE LA LISTE DES DEMANDES D'UN ELEVEUR DANS index.blade.php
 */
class ListeDemandesVetoFournisseur extends ListeFournisseur
{

  public function creeliste($demandes)
  {
    $this->liste = collect();

    foreach ($demandes as $demande) {

      $description = [];

      $eleveur = $this->itemFactory($demande->user->name);

      $analyse = $this->lienFactory($demande->id, $this->acteTypeLong($demande->anaacte), 'routeurDemande', 'affiche_detail_demande');

      if(isset($demande->serie_id)) {

        $serie = $this->lienFactory($demande->serie->id, "n°".$demande->serie->id, 'routeurSerie', 'affiche_detail_serie');

      }
      else {

        $serie = $this->itemFactory('');

      }

      $espece = $this->iconeFactory($demande->espece->icone);

      $reception = $this->dateFactory($demande->date_reception);

      $terminee = $this->ouinonFactory($demande->id, $demande->signe);

      $description = [
        $eleveur,
        $analyse,
        $serie,
        $espece,
        $reception,
        $terminee,
      ];

      $this->liste->put($demande->id, $description);
    }

    return $this->liste;

  }
}
