<?php
namespace App\Http\Traits;

use App\Models\Productions\Demande;

use App\Http\Traits\FormatDate;
use App\Http\Traits\ListeNomParasites;

/**
 * MODIFICATION DE DONNES D'UNE DEMANDE:
 *   AJOUTE UN ATTRIBUT estNegatif (true ou false) AUX PRELEVEMENTS,
 *   AJOUTE UN TABLEAU AVEC LES PARASITES NON DETECTES D'UN PRELEVEMENT,
 *   FORMATE LA DATE DE LA DEMANDE POUR QU'ELLE SOIT LISIBLE
 */
trait DemandeFactory
{

  use FormatDate, ListeNomParasites;

  /*
  * AJOUTE L'ATTRIBUT estNegatif AUX PRELEVEMENTS: TRUE SI AUCUN PARASITE DETECTE, FALSE DANS LE CAS CONTRAIRE
  * AJOUTE UN TABLEAU AUX PRELEVEMENTS QUI CONTIENT LE NOM DE TOUS LES PARASITES NON DETECTES
  */
  public function configResultatsPrelevement($demande)
  {

    foreach ($demande->prelevements as $prelevement) {

      $toutNegatif = ($prelevement->resultats->count() == 0) ? true : false;

      $prelevement->toutNegatif = $toutNegatif;

      $listeNomParasites = $this->listeNomParasites($prelevement);

      $nonDetecte = [];

      $detecte = [];

      foreach ($prelevement->resultats as $resultat) {
        
        $detecte[] = $resultat->anaitem->nom;
      }

      foreach ($listeNomParasites as $nomParasite) {

        if(!in_array($nomParasite, $detecte)) {

          $nonDetecte[] = $nomParasite;

        }
      }


      $prelevement->nonDetecte = $nonDetecte;
    }

    return $demande;
  }

  public function formatDateDemande($demande)
  {

    $demande->date_prelevement = $this->dateReadable($demande->date_prelevement);

    $demande->date_reception = $this->dateReadable($demande->date_reception);

    $demande->date_resultat = $this->dateReadable($demande->date_resultat);

    $demande->date_envoi = $this->dateReadable($demande->date_envoi);

  }

}
