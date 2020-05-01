<?php
namespace App\Http\Traits;

use App\Models\Productions\Demande;
use App\Models\Productions\Commentaire;

use App\Http\Traits\ListeNomParasites;

/**
 * MODIFICATION DE DONNES D'UNE DEMANDE:
 *   AJOUTE UN ATTRIBUT estNegatif (true ou false) AUX PRELEVEMENTS,
 *   AJOUTE UN TABLEAU AVEC LES PARASITES NON DETECTES D'UN PRELEVEMENT,
 *   FORMATE LA DATE DE LA DEMANDE POUR QU'ELLE SOIT LISIBLE
 */
trait DemandeFactory
{

  use ListeNomParasites;

  /*
  * AJOUTE L'ATTRIBUT estNegatif AUX PRELEVEMENTS: TRUE SI AUCUN PARASITE DETECTE, FALSE DANS LE CAS CONTRAIRE
  * AJOUTE UN TABLEAU AUX PRELEVEMENTS QUI CONTIENT LE NOM DE TOUS LES PARASITES NON DETECTES
  */
  public function demandeFactory($demande)
  {
    $this->configResultatsPrelevement($demande);

    $this->ajouteCommentaire($demande);

    return $demande;
  }

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

  public function ajouteCommentaire($demande)
  {
    $commentaire = Commentaire::where('demande_id', $demande->id)->first();

    // S'il n'y a pas de commentaire, on en crée un avec des attributs à null (pour éviter les errreurs)
    if ($commentaire === null) {

      $commentaire = new Commentaire();
      $commentaire->commentaire = null;
      $commentaire->date_commentaire = null;
      $commentaire->labo = null;
    }

    $demande->commentaire = $commentaire;

  }

}
