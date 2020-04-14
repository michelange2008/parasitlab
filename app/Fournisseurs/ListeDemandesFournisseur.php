<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Models\Productions\Demande;

use App\Http\Traits\FormatDate;

/**
 *  FOURNIT LES DATAS POUR L'AFFICHAGE DE LA LISTE DES DEMANDES DANS index.blade.php
 */
class ListeDemandesFournisseur extends ListeFournisseur
{

  use FormatDate;

  public function creeliste($demandes)
  {
    $this->liste = collect();

    foreach ($demandes as $demande) {

      $description = [];

      $eleveur = $this->lienFactory($demande->user->id, ucfirst($demande->user->name), 'eleveurAdmin.show', 'affiche_detail_eleveur');

      $analyse = $this->lienFactory($demande->id, $this->acteTypeCourt($demande->anaacte), 'demandes.show', 'affiche_detail_analyse');

      if(isset($demande->serie_id)) {

        $serie = $this->lienFactory($demande->serie->id, "n°".$demande->serie->id, 'serie.show', 'affiche_detail_serie');

      }
      else {

        $serie = $this->itemFactory('');

      }

      $espece = $this->iconeFactory($demande->espece->icone);

      if ($demande->toveto) {

        $toveto = $this->lienFactory($demande->veto->user->id, ucfirst($demande->veto->user->name), 'vetoAdmin.show', 'affiche_veto');

      }
      else {

        $toveto =$this->itemFactory("");
      }


      $reception = $this->itemFactory($this->dateSortable($demande->date_reception));

      $terminee = $this->ouinonFactory($demande->id, $demande->acheve);

      $signe = $this->ouinonFactory($demande->id, $demande->signe);

      $facturee = $this->ouinonFactory($demande->id, $demande->facturee);

      if ($demande->facturee) {

        $facture_id = $this->lienFactory($demande->facture->id, "n°".$demande->facture->id, 'factures.show', 'affiche_facture');

      }

      else {

        $facture_id = $this->itemFactory(" - ");

      }

      $suppr = $this->delFactory($demande->id, 'demandes.destroy');

      $description = [
        $eleveur,
        $analyse,
        $serie,
        $espece,
        $toveto,
        $reception,
        $terminee,
        $signe,
        $facturee,
        $facture_id,
        $suppr,
      ];

      $this->liste->put($demande->id, $description);
    }

    return $this->liste;

  }
}
