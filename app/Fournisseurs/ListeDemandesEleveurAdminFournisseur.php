<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Models\Productions\Demande;

/**
 *  FOURNIT LES DATAS POUR L'AFFICHAGE DE LA LISTE DES DEMANDES D'UN ELEVEUR DANS index.blade.php
 */
class ListeDemandesEleveurAdminFournisseur extends ListeFournisseur
{

  public function creeliste($demandes)
  {
    $this->liste = collect();

    foreach ($demandes as $demande) {

      $description = [];

      $analyse = $this->lienFactory($demande->id, $this->acteTypeCourt($demande->anaacte), 'demandes.show', 'affiche_detail_demande');

      if(isset($demande->serie_id)) {

        $serie = $this->lienFactory($demande->serie->id, "n°".$demande->serie->id, 'serie.show', 'affiche_detail_serie');

      }
      else {

        $serie = $this->itemFactory('','');

      }

      $espece = $this->iconeFactory($demande->espece->icone);

      if ($demande->toveto) {

        $toveto = $this->lienFactory($demande->tovetouser->id, $demande->tovetouser->name, 'vetoAdmin.show', 'affiche_veto');

      }
      else {

        $toveto =$this->itemFactory("");

      }

      $reception = $this->dateFactory($demande->date_reception);

      $terminee = $this->ouinonFactory(null, $demande->acheve);

      $facture = ($demande->facture != null) ? $this->lienFactory($demande->facture->id, "n°".$demande->facture->id, 'factures.show', 'affiche_facture') : "-";

      $suppr = $this->delFactory($demande->id, 'demandes.destroy');

      $description = [
        $analyse,
        $serie,
        $espece,
        $toveto,
        $reception,
        $terminee,
        $facture,
        $suppr,
      ];

      $this->liste->put($demande->id, $description);
    }

    return $this->liste;

  }
}
