<?php

namespace App\Http\Controllers\Api;
use DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Espece;
use App\Models\Age;
use App\Models\Troupeau;
use App\Models\Animal;
use App\Models\Algorithme\Categorie;
use App\Models\Algorithme\Observation;
use App\Models\Algorithme\Exclusion;
use App\Models\Algorithme\ExclusionsAnaacte;
use App\Models\Analyses\Anaacte;
use App\Models\Analyses\Anatype;

class DonneesController extends Controller
{
  /**
  * Méthode pour fournir la liste d'espèce dans la fenêtre de coix d'un formulaire à télécharger
  * utilisee dans telFormulaire.js
  */
  public function especes()
  {
    return json_encode(Espece::all());
  }

  /**
  * Méthode pour fournir la liste des ages en fonction d'une espèce dans la fenêtre de choix d'analyse
  * utilisee dans telFormulaire.js
  */
  public function ages($espece_id)
  {
    return json_encode(Age::where('espece_id', $espece_id)->with('icone')->get());
  }

  public function troupeau($eleveur_id, $espece_nom)
  {
    $espece = Espece::where('nom', $espece_nom)->first();

    $troupeau = Troupeau::where(['user_id' => $eleveur_id, 'espece_id' => $espece->id])->get();

    return json_encode($troupeau);

  }

  public function animal($troupeau_id)
  {
    $animals = Animal::where('troupeau_id', $troupeau_id)->get();

    return json_encode($animals);
  }

  /**
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

  /**
  * Méthode pour fournir les observations correspondant à un age d'une espece dans le choix de l'analyse
  * Vue: choisir.blade
  * JS: choisir.js
  */
  public function observationSelonAge($age_id)
  {
    $observations = DB::table('observations')
                     ->join('age_observation', 'age_observation.observation_id', "=", 'observations.id')
                     ->where('age_observation.age_id', $age_id)
                     ->orderBy('observations.ordre')->get();

    return json_encode($observations);
  }
/** Fonction transitoire pour tester la requete ajax "options" et destinée à afficher un formulaire avec les variables (espece, observations) */
public function essai()
{
  return view('essai');
}

/**
* Méthode qui renvoie les anatypes et les analyses possibles en fonction du choix de l'espèce
* et des observations sélectionnées - Même vue etjs que ci-dessus
*/
public function selectAnalyses(Request $request)
{
  $datas = $request->all();
  // On crée une collection des anatypes permis par une espece ou un age donne
  $liste_anatypes_espece_age = Collect();
  // S'il n'y a pas de choix d'un age
  $age_id = ($datas['age'] === null) ? null : $datas['age']; // si il n'y a pas de choix d'une age, on met null pour l'age_id
  if($age_id === null) {
    // On récupère l'espece
    $espece = Espece::find($datas['espece']);
    // On recherche d'abord les anatypes acceptés pour l'espece (table pivot anaacte_espece)
    $anatypes = $espece->anatypes;

    foreach ($anatypes as $anatype) {
      $liste_anatypes_espece_age->push($anatype->id);

    }
    // S'il y a le choix d'un age
  } else {

    // On récupère l'age
    $age = Age::find($datas['age']);
    // On recherche d'abord les anaactes acceptés pour l'age (table pivot age_anaacte)
    $anatypes = $age->anatypes;

    foreach ($anatypes as $anatype) {
      $liste_anatypes_espece_age->push($anatype->id);
    }
  }
  // On récupère les observations dans une collection avec 3 item: 1 pour chaque catégorie d'observation
  // (signe, action, situation) sachant qu'il peut y en avoir un ou deux null
  $observations = Collect();
  for ($i=1; $i < Categorie::count()+1  ; $i++) {
    // ces trois id d'observation sont stockées dans la collection $observations
    $observations->push($datas['categorie_'.$i]);
  }
  // Puis on recherche les anatypes permis par les observations
  $liste_anatypes = Collect();
  $liste_exclusions = Collect(); // Liste des id des anatypes exclus par les observations retenues (par exemple: paturage humide exclue petite douve)
  // On passe en revue la collection $observations
  foreach ($observations as $observation_id) {
    // Si cette observation n'est pas nulle
    if(isset($observation_id)) {
      // On la recherche dans la base de donnée
      $observation = Observation::find($observation_id);
      // On recherche les anatypes exclus par cette observation
      $exclusions = Exclusion::where('observation_id', $observation_id)->where('espece_id', $datas['espece'])->where('age_id', $age_id)->get();
      // On remplit la liste correspondante
      foreach ($exclusions as $exclusion) {
        $liste_exclusions->push($exclusion->anatype_id);
      }
      // On passe en revue tous les anatypes permis par l'observation (table pivot anatype_observation)
      foreach ($observation->anatypes as $anatype) {
          // Et on continue l'ajout dans la liste des anatypes
          $liste_anatypes->push($anatype->id);
      }
    }
  }
  // On élimine des deux listes construites les id d'anaacte qui sont dans la liste d'exclusion
  $liste_anatypes = $liste_anatypes->diff($liste_exclusions);
  $liste_anatypes_espece_age = $liste_anatypes_espece_age->diff($liste_exclusions);
  // On crée la collection qui sera transmise en réponse à la requête ajax
  $resultats = Collect();
  // On élimine les doublons (countBy), on trie en descendant(sort et inverse), et on garde que les deux premières clefs ( keys: n° option les plus fréquants)
  // $resultats->put("options", $liste_options->countBy()->sort()->reverse()->slice(0,2)->keys());
  // On ne garde que les anatypes de la liste $liste_anatypes qui sont aussi présents dans la liste des especes (intersect)
  // On élimine les doublons (countBy), on trie en descendant(sort et reverse), et on garde que les deux premières clefs ( keys: n° anatype les plus fréquants)
  $anatypes_retenus = $liste_anatypes->intersect($liste_anatypes_espece_age)->countBy()->sort()->reverse()->slice(0,2)->keys();

  $resultats->put("anatypes", $anatypes_retenus);

  return json_encode($resultats);

}



  public function anaacteSelonAnatypeEspece($anatype_id, $espece)
  {
    $espece_choisie = Espece::where('nom', '=', $espece)->first();

    $anaactes = DB::table('anaactes')
                ->where('anaactes.anatype_id', '=', $anatype_id)
                ->where('anaactes.estActif', '=', true)
                ->get();

    return json_encode($anaactes);
  }

  public function anatypeSelonEspece($espece_nom)
  {
    $espece = Espece::where('nom', $espece_nom)->first();

    // $anaactes = $espece->anaactes;

    $liste_anatype = Collect();

    foreach ($espece->anatypes as $anatype) {

      if($anatype->estAnalyse) {

        $liste_anatype->push($anatype->id);

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

      $demande->date_reception = Carbon::parse($demande->date_reception)->isoFormat('LL');

      $liste[$i] =$demande;

      $i++;

    }

}
// On renvoie ce json pour affichage éventuel des lignes
  return json_encode($liste);
}

public function exclusionsAnatypeObservation($observation_id)
{
  $exclusions = Exclusion::where('observation_id', $observation_id)->get();

  return json_encode($exclusions);
}

public function exclusionsAnaacteObservation($observation_id)
{
  $exclusionsAnaacte = ExclusionsAnaacte::where('observation_id', $observation_id)->get();

  return json_encode($exclusionsAnaacte);
}

}
