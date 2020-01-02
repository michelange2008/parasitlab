<?php
namespace App\Http\Traits;

use App\Models\Analyses\Anaitem;
use App\Models\Analyses\Analyse;
use App\Models\Analyses\Anaitem_analyse;
use Carbon\Carbon;

/**
 * TRAIT DESTINE A MANIPULER LES DONNES EN LIEN AVEC DES SERIES (EX TEST DE RESISTANCE OU SUIVI DE CAMPAGNE)
 * MÉTHODES
 * -> identificationsIdentiques : vérifie si un série comporte des demandes identiques: nombre et identification des prélèvement
 * -> construitTableauResultats : met en forme un tableau à partir des résultats des différentes demandes de la série pour un affichage de synthèse
 */
trait SerieInfos
{

  public function serieInfos($serie)
  {
    $serieInfos = Collect();

    $serieInfos->identique = $this->identificationsIdentiques($serie); // Booléen pour savoir si tous les prélèvements de la série sont identiques

    $serieInfos->serieTableau = $this->construitTableauResultats($serie); // Tableaux avec la ligne de titre et les valeurs

    return $serieInfos;;

  }

  /**
   * METHODE DESTINE A VERIFIER SI LES SERIES (SUITE DE PLUSIEURS LOTS DE PRELEVEMENT DANS LE CAS DES SUIVIS DE CAMPAGNE OU DES TESTS DE RÉSISTANCE)
   *  SONT COMPATIBLES AVEC UN AFFICHAGE SYNTHETIQUE
   * C-a-D SI CHAQUE DEMANDE DE PRÉLEVEMENT CORRESPOND AUX MEMES IDENTIFICATION DES ANIMAUX (ex maigre/normale pour la première demande
   * et maigre/normale pour la deuxième)
   */

  function identificationsIdentiques($serie)
  {

    $identique = true; // vrai si toutes les demandes de la série portent les mêmes identifications

    // verifie que le nombre de prélevement est indentique d'une demande à l'autre
    $liste_nb_prelevements = collect();

    foreach ($serie->demandes as $demande) {

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

      foreach ($serie->demandes as $demande) {

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

  public function construitTableauResultats($serie)
  {
    $serieTitres = collect(); // LIGNE DE TITRES DU TABLEAU
    $serieValeurs = []; // TABLE DE VALEURS
/*
* CREATION DE LA LIGNE TITRE: ON MET "lots" PUIS ON AJOUTE LES DATES DES DIFFÉRENTES ANALYSES
*/
    $serieTitres->push('Lots / Parasites');

    foreach ($serie->demandes as $demande) {
      if ($demande->date_prelevement !== null) {

        $serieTitres->push(Carbon::createFromFormat('Y-m-d H:i:s', $demande->date_prelevement)->formatLocalized('%d %B %Y'));

      }
      else {

        $serieTitres->push(Carbon::createFromFormat('Y-m-d H:i:s', $demande->date_reception)->formatLocalized('%d %B %Y'));
      }
    }

    $nb_prelevements = $serie->demandes[0]->prelevements->count();

/*
* PROCEDURE UN PEU COMPLEXE POUR OBTENIR LA TABLE DE DONNEE:
* IL FAUT CONSTRUIRE UNE LIGNE AVEC L'IDENTIFIANT DU LOT ET
*/
  $donnees_en_ligne = [];
    foreach($serie->demandes as $demande) { // ON CREE D'ABORD UN TABLEAU DE TABLEAUX QUI CONTIENNENT TOUTES LES INFORMATIONS
      foreach ($demande->prelevements as $prelevement) {
        foreach($prelevement->resultats as $resultat)
          if($resultat->valeur >0 && $resultat->valeur !== "absence" && $resultat->valeur !== null ) {

            $result['ident'] = $prelevement->identification; // NOM DU LOT
            $result['nom'] = $resultat->anaitem->nom; // NOM DU PARASITE
            $result['valeur'] = $resultat->valeur; // VALEUR CORRESPONDANT A CE PARASITE DE CE LOT

            $donnees_en_ligne[] = $result; // ON EMPILE TOUT ÇA DANS UN TABLEAU
          }
        }
    }

    $donnees_en_collection=collect($donnees_en_ligne); // ON TRANSFORME LE TABLEAU EN COLLECTION

    $serieValeurs_origine = $donnees_en_collection->groupBy(['ident', 'nom']); // POUR POUVOIR GROUPER PAR LOT ET NOM DE PARASITE

    $i =0; // ON INCREMENTE $i POUR POUVOIR AJOUTER A CHAQUE FOIS UNE LIGNE AU TABLEAU FINAL

    foreach ($serieValeurs_origine as $nom => $infos_totales)  // ON BOUCLE SUR LES NOMS DE LOT
    {

      $serieValeurs[$i] = [$nom]; // ON AJOUTE CE NOM A LA PREMIERE LIGNE

      for ($j=0; $j < $nb_prelevements ; $j++)  // PUIS ON AJOUTE AUTANT DE CASE VIDE QU'IL Y A DE PRELEVEMENTS
      {
        array_push($serieValeurs[$i], ""); // CAR LA LIGNE AVEC LE NOM DU LOT NE COMPORTE PAS DE VALEUR (LIGNE SOUS-TITRE)
      }

      foreach($infos_totales as $info)  // PUIS ON BOUCLE SUR LE INFOS DE CHAQUE LOT
      {

        $nom =''; // ON INITIALISE LA VARIABLE NOM QUI VA NOUS SERVIR POUR NE PAS AJOUTER LE NOM DU LOT À QUAQUE ITERATION DES INFOS DE CE LOT

        $i++; // ON INCREMENT $i POUR PASSER À LA LIGNE SUIVANTE

        foreach ($info as $detail)  // ON BOUCLE SUR LE DETAIL DES INFOS D'UN PRELEVEMENT
        {

          if($detail['nom'] !== $nom) { // SI LE NOM N'A PAS DEJA ETE RENCONTRÉ
            $serieValeurs[$i] = [$detail['nom'], $detail['valeur']]; // ON L'AJOUTE AU DEBUT DE LA LIGNE PUIS ON AJOUTE LA PREMIERE VALEUR
          }

          else { // SI LE NOM A DÉJA ÉTÉ RENCONTRÉ CEST QU ON EST À LA DEUXIÈME OU TROISIÈME VALEUR
            if($serieValeurs[$i] !== null) array_push($serieValeurs[$i], $detail['valeur']); // ON AJOUTE DONC SEULEMENT LE RESULTAT DE L'ANALYSE
          }

          $nom = $detail['nom']; // ON ATTRIBUE LE NOM DU PARSASITE QUI VIENT D'ETRE VU POUR S'Y RETROUVER
        }
      }

      $i++; // ON INCREMENTE $i POUR POUVOIR PASSER A LA LIGNE SUIVANTE

    } // ET VOILA LE TRAVAIL... C EST UN PEU POURRI COMME METHODE MAIS JE N'AI PAS TROUVE MIEUX !!!

    $serieTableau = Collect(); // ENSEMBLE DES DEUX RETOURNÉ PAR LA METHODE
    $serieTableau->titres = $serieTitres->toArray();
    $serieTableau->valeurs = $serieValeurs;

    return $serieTableau;
  }
}
