<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Models\Productions\Demande;

/**
 *  FOURNIT LES DATAS POUR L'AFFICHAGE DE LA LISTE DES DEMANDES D'UN ELEVEUR DANS index.blade.php
 */
class ListeDemandesEleveurFournisseur extends ListeFournisseur
{

  public function creeliste($demandes)
  {
    $this->liste = collect();

    foreach ($demandes as $demande) {

      $description = [];

      $analyse = $this->lienFactory($demande->id, $this->acteTypeLong($demande->anaacte), 'eleveur.demandeShow', 'affiche_detail_demande');

      $espece = $this->iconeFactory($demande->espece->icone);

      $reception = $this->dateFactory($demande->date_reception);

      $terminee = $this->ouinonFactory(null, $demande->acheve);

      $facturee = $this->ouinonFactory($demande->id, $demande->facturee);

      if ($demande->facturee) {

        $facture_id = $this->lienFactory($demande->facture->id, "n°".$demande->facture->id, 'eleveur.factureShow', 'affiche_facture');

      }

      else {

        $facture_id = $this->itemFactory(" - ");

      }

      $description = [
        $analyse,
        $espece,
        $reception,
        $terminee,
        $facturee,
        $facture_id,
      ];

      $this->liste->put($demande->id, $description);
    }

    return $this->liste;

  }
}
