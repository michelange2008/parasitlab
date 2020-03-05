<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

use App\Models\Productions\Demande;

use App\Http\Traits\FormatDate;

/**
 *  FOURNIT LES DATAS POUR L'AFFICHAGE DE LA LISTE DES DEMANDES D'UN ELEVEUR DANS index.blade.php
 */
class ListeDemandesEleveurFournisseur extends ListeFournisseur
{

  use FormatDate;

  public function creeliste($demandes)
  {
    $this->liste = collect();

    foreach ($demandes as $demande) {

      $description = [];

      $analyse = $this->lienFactory($demande->id, $demande->anapack->nom, 'eleveur.demandeShow', 'Cliquer pour voir le détail de la demande');

      $espece = $this->iconeFactory($demande->espece->icone);

      // if(isset($demande->serie_id)) {
      //
      //   $serie = $this->lienFactory($demande->serie->id, "n°".$demande->serie->id, 'eleveur.serieShow', 'Cliquer pour voir la série');
      //
      // }
      // else {
      //
      //   $serie = $this->itemFactory('','');
      //
      // }
      //
      // if ($demande->toveto) {
      //
      //   $toveto = $this->itemFactory($demande->veto->user->name);
      //
      // }
      // else {
      //
      //   $toveto =$this->itemFactory("");
      //
      // }

      $reception = $this->itemFactory($this->dateSortable($demande->date_reception));

      $terminee = $this->ouinonFactory(null, $demande->acheve);

      $facturee = $this->ouinonFactory($demande->id, $demande->facturee);

      if ($demande->facturee) {

        $facture_id = $this->lienFactory($demande->facture->id, "n°".$demande->facture->id, 'home', "Cliquer pour afficher cette facture");

      }

      else {

        $facture_id = $this->itemFactory(" - ");

      }

      $description = [
        $analyse,
        $espece,
        // $serie,
        // $toveto,
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
