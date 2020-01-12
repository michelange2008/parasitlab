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

      $eleveur = $this->lienFactory($demande->user->id, ucfirst($demande->user->name), 'eleveurAdmin.show', "Cliquer pour afficher le détail de cet éleveur");

      $analyse = $this->lienFactory($demande->id, $demande->anapack->nom, 'demandes.show', "Cliquer pour afficher le détail de cette analyse");

      if(isset($demande->serie_id)) {

        $serie = $this->lienFactory($demande->serie->id, "n°".$demande->serie->id, 'serie.show', "Cliquer pour afficher cette série");

      }
      else {

        $serie = $this->itemFactory('');

      }

      $espece = $this->iconeFactory($demande->espece->icone);

      if ($demande->toveto) {

        $toveto = $this->lienFactory($demande->veto->user->id, ucfirst($demande->veto->user->name), 'vetoAdmin.show', "Cliquer pour afficher ce vétérinaire");

      }
      else {

        $toveto =$this->itemFactory("");
      }


      $reception = $this->itemFactory($this->dateSortable($demande->date_reception));

      $terminee = $this->ouinonFactory($demande->id, $demande->acheve);

      $facture = $this->lienFactory($demande->facture->id, "n°".$demande->facture->id, 'home', "Cliquer pour afficher cette facture");

      $suppr = $this->delFactory($demande->id, 'demandes.destroy');

      $description = [
        $eleveur,
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
