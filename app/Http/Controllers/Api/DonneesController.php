<?php

namespace App\Http\Controllers\Api;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Espece;
use App\Models\Categorie;
use App\Models\Observation;
use App\Models\Analyses\Anaacte;

use App\Http\Traits\FormatDate;

class DonneesController extends Controller
{
  use FormatDate;
  /*
  * Méthode pour fournir la liste d'espèce dans la fenêtre de coix d'un formulaire à télécharger
  * utilisee dans telFormulaire.js
  */
  public function especes()
  {
    return json_encode(Espece::all());
  }

  /*
  * Méthode pour fournir les observations correspondant à une espèce dans le choix de l'analyse
  * Vue: choisir.blade
  * JS: choisir.js
  */
  public function observationSelonEspece($espece_id)
  {

    $observations = DB::table('observations')
                     ->join('espece_observation', 'espece_observation.observation_id', "=", 'observations.id')
                     ->where('espece_observation.espece_id', $espece_id)
                     ->orderBy('observations.ordre')->get();

    return json_encode($observations);
  }


/*
* Méthode qui renvoie les options et les analyses possibles en fonction du choix de l'espèce
* et des observations sélectionnées - Même vue etjs que ci-dessus
*/
public function options(Request $request)
  {
    $datas = $request->all();

    // On récupère l'espece
    $espece = Espece::find($datas['espece']);

    // On recherche d'abord les anaactes acceptés pour l'espece (table pivot anaacte_espece)
    $anaactes = $espece->anaactes;
    $liste_anaactes_espece = Collect();
    foreach ($anaactes as $anaacte) {
         $liste_anaactes_espece->push($anaacte->id);
    }

    // On récupère les observations dans une collection avec 3 item: 1 pour chaque catégorie d'observation
    // (signe, action, situation) sachant qu'il peut y en avoir un ou deux null
    $observations = Collect();
    for ($i=1; $i < Categorie::count()+1  ; $i++) {
      // ces trois id d'observation sont stockées dans la collection $observations
      $observations->push($datas['categorie_'.$i]);
    }
    // Puis on recherches les options et les anaactes permis par les observations
    $liste_options = Collect();
    $liste_anaactes = Collect();
    // On passs en revue la collection $observations
    foreach ($observations as $observation_id) {
      // Si cette observation n'est pas nulle
      if(isset($observation_id)) {
        // On la recherche dans la base de donnée
        $observation = Observation::find($observation_id);
        // Et on passe en revue les options possibles avec cette observation (table pivot observation_option)
        foreach ($observation->options as $option) {
          // Si au moins une option existe pour cette observation
          if(isset($option->nom)) {
            // on passe en revue les anaactes permis par cette option (table pivot anaacte_option)
            foreach($option->anaactes as $anaacte) {
              // Et on ajoute l'id de l'anaacte à la liste
              $liste_anaactes->push($anaacte->id);
            }
            // Et on ajoute l'option à la liste d'options
            $liste_options->push($option->nom);
          }
        }
        // On passe en revue tous les anaactes permis par l'observation (table pivot anaacte_observation)
        foreach ($observation->anaactes as $anaacte) {
          // Et on continue l'ajout dans la liste des anaactes
          $liste_anaactes->push($anaacte->id);
        }
      }
    }
    // On crée la collection qui sera transmise en réponse à la requête ajax
    $resultats = Collect();
    // On élimine les doublons (countBy), on trie en descendant(sort et inverse), et on garde que les deux premières clefs ( keys: n° option les plus fréquants)
    $resultats->put("options", $liste_options->countBy()->sort()->reverse()->slice(0,2)->keys());
    // On ne garde que les anaactes de la liste $liste_anaactes qui sont aussi présents dans la liste des especes (intersect)
    // On élimine les doublons (countBy), on trie en descendant(sort et inverse), et on garde que les deux premières clefs ( keys: n° anaacte les plus fréquants)
    $resultats->put("anaactes",$liste_anaactes->intersect($liste_anaactes_espece)->countBy()->sort()->reverse()->slice(0,2)->keys());

    return json_encode($resultats);


  }

  public function anaacteSelonAnatypeEspece($anatype_id, $espece)
  {
    $espece_choisie = Espece::where('nom', '=', $espece)->first();

    $anaactes = DB::table('anaactes')
                ->where('anaactes.anatype_id', '=', $anatype_id)
                ->join('anaacte_espece', 'anaacte_espece.anaacte_id', '=', 'anaactes.id')
                ->where('anaacte_espece.espece_id', '=' , $espece_choisie->id)->get();

    return json_encode($anaactes);
  }

  public function anatypeSelonEspece($espece_nom)
  {
    $espece = Espece::where('nom', $espece_nom)->first();

    $anaactes = $espece->anaactes;

    $liste_anatype = Collect();

    foreach ($anaactes as $anaacte) {

      if($anaacte->estAnalyse) {

        $liste_anatype->push($anaacte->anatype->id);

      }

    }

    return json_encode($liste_anatype->unique());
  }

  /**
* REQUETE AJAX DE CreateDemande.js **************************
* METHODES POUR AIDER A LA SAISIE D'UNE NOUVELLE DEMANDE ET VERIFIANT SI CETTE DEMANDE RENVOIE A UNE serie
* VOIRE UNE SERIE DEJA EXISTANTE
* Méthode qui renvoie un json (liste) qui comprend:
*  - Un booleen (estSerie) : true si l'anaacte correspond à une serie, false dans le cas contraire
*  - un tableau avec la liste des demandes qui correspondent au meme anaacte et qui ne sont pas achevées
*
*/
public function estSerie($anaacte_id, $user_id)
{
  $anaacte = Anaacte::find($anaacte_id); // On récupère l'anaacte
  $liste["estSerie"] = $anaacte->estSerie; // On ajoute le booleen qui dit si cet anaacte correspond à une serie

  $listeDemandeSerieNonAcheve = []; // On crée le tableau dans lequel viendra les demandes de ce user, avec le
  // même anaacte s'il correspond à une série et si la série n'est pas achevée.

  if($anaacte->estSerie) { // Si cet anaacte est bien une série
    // Requete pour récupérer les demandes d'analyse de cet éleveur, correspondant au même pack et dont la série n'est pas terminée
    $demandes = DB::table('demandes')
                  ->join('series', 'series.id', '=', 'demandes.serie_id')
                  ->where('demandes.user_id', $user_id) // On récupère les demandes correspondantes
                  ->where('demandes.anaacte_id', $anaacte_id)
                  ->where('series.acheve', '=', false)
                  ->get();

    $liste['nbDemandes'] = $demandes->count();

    $i = 0;

    foreach ($demandes as $demande) {

      $demande->date_reception = $this->dateReadable($demande->date_reception);

      $liste[$i] =$demande;

      $i++;

    }

}
// On renvoie ce json pour affichage éventuel des lignes
  return json_encode($liste);
}


}
