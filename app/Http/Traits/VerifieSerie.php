<?php
namespace App\Http\Traits;

/**
 * TRAIT DESTINE A VERIFIER SI LES SERIES (SUITE DE PLUSIEURS LOTS DE PRELEVEMENT DANS LE CAS DES SUIVIS DE CAMPAGNE OU DES TESTS DE RÉSISTANCE)
 *  SONT COMPATIBLES AVEC UN AFFICHAGE SYNTHETIQUE
 * C-a-D SI CHAQUE DEMANDE DE PRÉLEVEMENT CORRESPOND AUX MEMES IDENTIFICATION DES ANIMAUX (ex maigre/normale pour la première demande
 * et maigre/normale pour la deuxième)
 */
trait VerifieSerie
{
  function identificationsIdentiques($serie)
  {

    $identique = true; // vrai si toutes les demandes de la série portent les mêmes identifications

    // verifie que le nombre de prélevement est indentique d'une demande à l'autre
    $liste_nb_prelevements = collect();

    foreach ($serie as $demande) {

      $liste_nb_prelevements->push($demande->nb_prelevement);

    }

    $nb_prelevements = $liste_nb_prelevements->unique()->first();

    if($liste_nb_prelevements->unique()->count() !== 1) {

      $identique = false;

    } else {
      // vérifie que les identifications sont les mêmes en creant une collection avec toutes les identifications
      // puis en réduisant les doublons et en vérifiant que la taille de la collection réduite est égale au nombre
      // de prélèvement de la série
      $liste_identifications = collect(); // tableau vide pour y mettre les libellés des identifications

      foreach ($serie as $demande) {

        foreach($demande->prelevements as $prelevement) {

          $liste_identifications->push($prelevement->identification);

        }

      }

      if($liste_identifications->unique()->count() !== $nb_prelevements) {

        $identique = false;

      }

    }

    return $identique;
  }
}
