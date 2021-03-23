<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Collection;

use App\User;
use App\Models\Espece;
use App\Models\Productions\Demande;
use App\Models\Productions\Prelevement;
use App\Models\Productions\Resultat;
use App\Models\Analyses\Anaitem;
use App\Models\Analyses\Analyse;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ResultatsExportation;
use App\Http\Traits\LitJson;
use App\Http\Traits\Personne;
use App\Http\Traits\UserTypeOutil;
use Carbon\Carbon;

/**
 * Gestion des exports xlsx, libreoffice.
 *
 * Il y a deux façon d'exporter les résultats d'analyses dans un format de tableur:
 * + _Export global_ de l'ensemble des résultats avec des filtres possibles. Ce mode
 * d'export est réserver aux _usertype_ laboratoire
 * + _Export des résultats d'une analyse_: disponible pour tous les utilisateurs
 * authentifiés: exporte uniquement le résultats d'une analyse. Le bouton est sur la page
 * d'affichage des résultats d'analyses.
 *
 * Oui je sais, ça fait 500 lignes de code !!! Mais y a beaucoup de documentation :)
 * @todo: A AMELIORER CETTE HIDEUSE DOUBLE BOUCLE IF ELSE
 */
class ExportsController extends Controller
{
  use LitJson, UserTypeOutil, Personne;

  /**
   * Array avec la liste des éléments pour afficher le menu à partir de la lecture
   * d'un fichier json (menuLabo)
   * @var Array
   */
  protected $menu;

  /**
   * Array avec la liste des formats d'exportation. Permet de modifier ces formats
   * sans toucher au code du controleur
   * @var array
   */
  protected $formats;
  /**
  * Récupère les données des fichiers json pour les variable menu et formats
  *
  * @return \Illuminate\Http\Response
  */
  public function __construct()
  {
    $this->menu = $this->litJson("menuLabo");
    $this->formats = $this->litJson('formats_export');
  }

  /**
   * Prépare les données pour le formulaire de choix des résultats à exporter
   *
   * @return \Illuminate\View\View exports/choix
   */
  public function choix()
  {

    $users = User::all();
    $demandes = Demande::all();
    $especes = Espece::orderBy('nom')->get();
    $anaitems = Anaitem::orderBy('nom')->get();
    $de = (new Carbon(Demande::min('date_prelevement')))->toDateString(); // permet d'avoir les dates de 1ère
    $a = (new Carbon(max([
    Demande::max('date_prelevement'),
    Demande::max('date_reception'),
    Demande::max('date_resultat'),
    Demande::max('date_envoi'),
    Demande::max('date_signature'),
    ])))->toDateString(); // et dernière analyse

    return view('exports.choix', [
    'menu' => $this->menu,
    'formats' => $this->formats,
    'especes' => $especes,
    'users' => $users,
    'eleveurs' => User::where('usertype_id', $this->userTypeEleveur()->id)->orderBy('name')->get(),
    'vetos' => User::where('usertype_id', $this->userTypeVeto()->id)->orderBy('name')->get(),
    'anaitems' => $anaitems,
    'de' => $de,
    'a' => $a,
    ]);

  }

  /**
   * Crée le fichier d'en-tête des colonnes pour une demande d'analyse
   *
   * @param  \App\Models\Productions\Demande $demande Objet demande d'analyse
   * @return str[]          Liste de en-têtes de colonne
   */
  public function entetesDemande($demande)
  {

    $analyse = Analyse::where('espece_id', $demande->espece_id)
    ->where('anatype_id', $demande->anaacte->anatype_id)
    ->first();

    $anaitems = $analyse->anaitems;

    $entete[] = 'Identification';
    $entete[] = 'Nom';

    foreach ($anaitems as $anaitem) {
      // Il faut faire une entete de colonne pour chaque type de parasite (= anaitem) mesuré
      $entete[] = ($anaitem->unite->nom === '') ? $anaitem->nom : $anaitem->nom.' ('. $anaitem->unite->nom .')';

    }

    $entete[] = "Troupeau";
    $entete[] = "Espece";
    $entete[] = "Date de prelevement";
    $entete[] = "Date d'analyse";
    $entete[] = "Mélange";
    $entete[] = "Semble parasité";

    return $entete;
  }

  /**
  * Exportation d'une demande d'analyse seule (disponible dans demandeShow)
  *
  * Crée un tableau avec une ligne pour la demande d'analyse
  *
  * @param int id de la demande
  * @return file fichier à télécharger
  * @see \App\Exports\ResultatsExportation
  */
  public function demande($demande_id)
  {
    $demande = Demande::find($demande_id);

    $prelevements = Prelevement::where('demande_id', $demande_id)->get();

    $entetes = $this->entetesDemande($demande);

    $resultats = Collect(); // ensemble des résultats exportés

    foreach ($prelevements as $prelevement) {

      $resultat = []; // Un résultat = une ligne dans le fichier tableur
      $resultat['identification'] = $prelevement->animal->numero ?? $prelevement->identification;
      $resultat['nom'] = $prelevement->animal->nom ?? '';
      // Il faut récupérer autant de colonne qu'il y a de parasites (= anaitem) à rechercher
      foreach ($prelevement->analyse->anaitems as $anaitem) {
        // On récupère le résultat pour le parasite
        $valeur = Resultat::where('prelevement_id', $prelevement->id)
        ->where('anaitem_id', $anaitem->id)->first();
        // Normalement $valeur ne peut pas être null car même les résultats négatifs font une colonne
        if($valeur != null) {

          $resultat[$anaitem->nom] = $valeur->valeur;
        // Mais si c'était le cas on attribue 0 à cette valeur
        } else {

          $resultat[$anaitem->nom] = "0";

        }

      }
      // On rajoute les autres informations de l'analyse
      $resultat['troupeau'] = $prelevement->demande->troupeau->nom ?? '';
      $resultat['espece'] = $prelevement->demande->espece->nom;

      $resultat['date_prelevement'] = (new Carbon($prelevement->demande->date_prelevement))->toDateString();
      $resultat['date_resultat'] = (new Carbon($prelevement->demande->date_resultat))->toDateString();

      $resultat['melange'] = ($prelevement->estMelange) ? 'oui' : 'non';
      $resultat['estParasite'] = ($prelevement->parasite) ? 'oui' : 'non';

      $resultats->push($resultat);

    }
    // On fait une variable de type ResultatsExportation qui hérite de plusieurs classes
    $resultatsExport = new ResultatsExportation($entetes, $resultats);
    // On renvoie un fichier à télécharger
    return Excel::download($resultatsExport, 'copro.xlsx');

  }

  /**
  * Renvoie le nombre d'enregistrement en fonction des critères: especes, parasites, éleveur, veterinaire, dates
  *
  * Ce nombre est demandé par une requête ajax de type post depuis Export.js
  * @param Illuminate\Http\Request issu du formulaire de la page exports/choix (cf. méthode __choix__)
  * @return int nombre d'enregistrements correspondant au choix
  */
  public function comptage(Request $request)
  {
    $resultats = $this->resultats($request->all());

    return $resultats->count();
  }

  /**
   * Récupère les informations du formulaire de la vue export/choix et renvoie un fichier tableur
   *
   * Il s'agit là d'une exportation de plusieurs résultats d'analyses.
   *
   * Cette méthode construite d'une part les en-têtes de colonne avec la méthode _anaitemsEntete_
   * @param  Request $request contenu du formulaire de la vue exports/choix avec les espèces et anaitems
   * @return file           fichier de tableur
   */
  public function export(Request $request)
  {
    $datas = $request->all();

    // Liste des parasites avec unité de comptage
    $anaitems = $this->anaitemsFromForm($datas);
    $anaitemsEntetes = $this->anaitemsEntete($anaitems);

    $entetes = array_merge([
    'animal_numero',
    'animal_nom',
    ],

    $anaitemsEntetes,

    [
    'date_prelevement',
    'date_resultat',
    'estParasite',
    'signes',
    'nom',
    'cp',
    'commune',
    'espece',
    'troupeau',
    'demande_id',
    'estMelange',
    ]);

    $resultats = $this->resultats($datas);

    $resultatsExport = new ResultatsExportation($entetes, $resultats);

    return Excel::download($resultatsExport, 'copro.'.$datas['format']);

  }

  /**
  * Renvoie les résultats d'analyse sous forme d'une collection dont chaque ligne est analyse
  *
  * Fait la requete pour connnaitres les enregistrements correspondant aux critères
  * issus du formulaire de la vue export/choix
  *
  * Chaque ligne correspondant aux résultats d'un prélèvement
  *
  * @param array $datas données issues du formulaire
  * @return Collect $resultats : collection de $resultats qui sont des tableaux avec toutes les
  * informations sur chaque analyse.
  */
  public function resultats($datas)
  {

    // On va chercher la liste des parasites concernés
    $anaitems = $this->anaitemsFromForm($datas);
    // Si on choisit toutes les especes, il faut aller chercher la totalité de id
    if ($datas['especes_export'][0] == "all") {

      $especes = Espece::all();

      foreach ($especes as $espece) {

        $liste_especes[] = $espece->id;

      }

    } else {

      $liste_especes = $datas['especes_export'];
    }

    // requetes pour connaître les demandes d'analyse correspondant aux choix
    // TODO: A AMELIORER CETTE HIDEUSE DOUBLE BOUCLE IF ELSE

    // J'AVAIS TROUVE UN SUPER SYSTEME POUR TOUT FAIRE EN UNE LIGNE MAIS CA MARCHE PAS CHEZ OVH !
    // $demandes = Demande::select('id')->where('user_id', 'like', $datas['eleveur'])
    // ->where('tovetouser_id', 'like', $datas['veto'])
    // ->whereIn('espece_id', $liste_especes)
    // ->where('date_prelevement', '>=', $datas['de'])
    // ->where('date_prelevement', '<=', $datas['a'])
    // ->get();
    if($datas['eleveur'] == "%"){

      if($datas['veto']== "%") {

        $demandes = Demande::select('id')
        ->whereIn('espece_id', $liste_especes)
        ->where('date_prelevement', '>=', $datas['de'])
        ->where('date_prelevement', '<=', $datas['a'])
        ->get();

      } else {

        $demandes = Demande::select('id')
        ->where('tovetouser_id', $datas['veto'])
        ->whereIn('espece_id', $liste_especes)
        ->where('date_prelevement', '>=', $datas['de'])
        ->where('date_prelevement', '<=', $datas['a'])
        ->get();

      }

    } else {

      if($datas['veto'] == "%") {

        $demandes = Demande::select('id')
        ->where('user_id', $datas['eleveur'])
        ->whereIn('espece_id', $liste_especes)
        ->where('date_prelevement', '>=', $datas['de'])
        ->where('date_prelevement', '<=', $datas['a'])
        ->get();

      } else {

        $demandes = Demande::select('id')
        ->where('tovetouser_id', $datas['veto'])
        ->where('user_id', $datas['eleveur'])
        ->whereIn('espece_id', $liste_especes)
        ->where('date_prelevement', '>=', $datas['de'])
        ->where('date_prelevement', '<=', $datas['a'])
        ->get();

      }
    }
    // On initialise une collection
    $prelevements = collect();
    // A partir des demandes on fait la liste des prélèvements
    foreach ($demandes as $demande) {
      $prelevement_par_demande = Prelevement::where('demande_id', $demande->id)->get();
      $prelevements = $prelevements->concat($prelevement_par_demande);
    }
/** INFO: la manipulation ci-dessous peut paraitre complexe mais elle tient compte du faire que
* l'on fait un tableau avec des analyses différentes. Dans pour certains prélèvements
* le parasite n'est pas toujours susceptible d'être recherché et donc il n'y pas de
* résultat (même pas un résultat nul) --> d'où la création de cette variable _$existe_un_prelevement_
*
*/
    $resultats = collect();
    // On initialise une variable
    $existe_un_prelevement = false;
    // On passe en revue tous les prélèvements
    foreach ($prelevements as $prelevement) {
      // On récupère les informations sur l'animal ou le lot prélevé
      $resultat['animal_numero'] = $prelevement->animal->numero ?? $prelevement->identification;
      $resultat['animal_nom'] = $prelevement->animal->nom ?? '';
      // On passe en revue tous les anaitems listés dans le formulaire de exports/choix
      foreach ($anaitems as $anaitem) {
        // On recherche un résultat pour ce prélèvement et cet anaitem
        $resultat_du_prelevement = Resultat::where('prelevement_id', $prelevement->id)->where('anaitem_id', $anaitem->id)->first();
        // SI ce résultat existe
        if($resultat_du_prelevement !== null) {
          // On bascule la variable
          $existe_un_prelevement = true;
          // Et on rajoute la valeur du résultat pour cet anaitem
          $resultat[$anaitem->nom] = $resultat_du_prelevement->valeur;

        } else {
          // Sinon on lui attribue une valeur NA
          $resultat[$anaitem->nom] = 'NA';
        }

      }
      // PUis on remplit le tableau résultats
      $resultat['date_prelevement'] = $prelevement->demande->date_prelevement;
      $resultat['date_resultat'] = $prelevement->demande->date_resultat;
      $resultat['estParasite'] = ($prelevement->parasite) ? "oui" : "non";
      $resultat['signes'] = '';
      $resultat['nom'] = $prelevement->demande->user->name;
      $resultat['cp'] = $this->personne($prelevement->demande->user->id)->cp;
      $resultat['commune'] = $this->personne($prelevement->demande->user->id)->commune;
      $resultat['espece'] = $prelevement->demande->espece->nom;
      $resultat['troupeau'] = $prelevement->demande->troupeau->nom;
      $resultat['demande_id'] = $prelevement->demande->id;
      $resultat['estMelange'] = ($prelevement->estMelange === true) ? "oui" : "non";
      // Et on l'ajoute à la collection
      $resultats->push($resultat);
    }
    // Si au bout du compte, il n'y avait vraiment pas de résultat, on renvoie une collection vide
    $resultats = ($existe_un_prelevement) ? $resultats : collect();

    return $resultats;
  }

  /**
  * Requête ajax dans la page choix pour afficher uniquement les parasites d'une espece donnée.
  *
  * voir le fichier javascript exports.js
  */
  public function anaitemsFromEspece($especes)
  {
    $especes = explode(',', $especes);

    $analyses = Analyse::whereIn('espece_id', $especes)->get();
    $anaitems = collect();
    $analyses_id = [];
    foreach ($analyses as $analyse) {

      foreach ($analyse->anaitems as $anaitem) {

        $anaitems->push([ 'id' => $anaitem->id , 'nom' => ucfirst($anaitem->nom) ]);

      }
    }

    $anaitems = $anaitems->unique();

    $anaitems = $anaitems->sortBy('nom');

    return json_encode($anaitems->values()->all());
  }

  /**
  * Crée un array avec une liste d'anaitems pour pouvoir faire les entetes de colonnes
  *
  * @param array anaitems (Objet)
  * @return array nom des parasites avec unité éventuellement
  */
  public function anaitemsEntete($anaitems) : Array
  {

    foreach ($anaitems as $anaitem) {

      $entetes[] = ($anaitem->unite->nom === '') ? $anaitem->nom : $anaitem->nom.' ('. $anaitem->unite->nom .')';

    }

    return $entetes;

  }

  /**
   * Récupère la liste des parasites (= anaitems) à partir des données issues du formulaire
   * mais pas directement : par l'intermédiaire des méthodes _resultats_ et _exports_
   *
   * @param  array     $datas données issues du formulaire de la vue exports/choix
   * @return Collection        requete sur les anaitems sélectionnés par le formulaire
   */
  public function anaitemsFromForm($datas) : Collection
  {
    if($datas['anaitems_export'][0] == "all") {

      $anaitems = Anaitem::all();

      foreach ($anaitems as $anaitem) {

        $liste_anaitems[] = $anaitem->id;

      }

    } else {

      $liste_anaitems = $datas['anaitems_export'];

    }
    // Liste des parasites
    $anaitems = Anaitem::select('id','unite_id','nom')->whereIn('id', $liste_anaitems)->get();

    return $anaitems;

  }

}
