<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EleveurStore;
use DB;

use App\User;
use App\Models\Veto;
use App\Models\Eleveur;
use App\Models\Productions\Demande;
use App\Models\Productions\Serie;
use App\Models\Productions\Commentaire;
use App\Models\Productions\Facture;
use App\Fournisseurs\ListeDemandesEleveurFournisseur;
use App\Http\Traits\DemandeFactory;
use App\Http\Traits\SerieInfos;
use App\Http\Traits\EleveurInfos;

use App\Http\Traits\LitJson;
use App\Http\Traits\FactureFactory;

/**
 * [EleveurController description]
 *
 * @package Utilisateurs
 */
class EleveurController extends Controller
{

  use LitJson, EleveurInfos, FactureFactory, SerieInfos, DemandeFactory;

  /**
   * Tableau avec les éléments du menu en accès public
   * @var array
   */
   protected $menu;

   /**
    * Constructeur qui remplit la variable $menu avec le tableau issu du json
    */
    public function __construct()
    {
        $this->menu = $this->litJson('menuExtranet');
    }

    public function index()
    {
      $user = User::find(auth()->user()->id);

      $demandes = Demande::where('user_id', auth()->user()->id)->get();

      $fournisseur = new ListeDemandesEleveurFournisseur();

      //methode renvoieDatas($liste_origine, $titre, $icone, $fichier_intitules, $addRoute = route du bouton au dessus du tableau peut être null, $addTitre = titre de ce bouton peut être null) de ListeFournisseur (classe abstraite dont dérive ListeDemandesEleveurFournisseur)
      $datas = $fournisseur->renvoieDatas($demandes, __('titres.list_demandes'), 'demandes.svg', 'tableauDemandesEleveur');

      return view('utilisateurs.index', [
        "menu" => $this->menu,
        'user' => $user,
        'route' => $user->usertype->route,
        'datas' => $datas,
      ]);
    }

    public function show($id)
    {
      $user = User::find($id);

      $this->authorize('view', $user);

      $eleveurInfos = $this->eleveurInfos($user); // Ajoute les nombres de demande (et plus tard peut-être d'autres infos)
      return view('utilisateurs.utilisateurShow', [
        'menu' => $this->menu,
        'user' => $user,
        'eleveurInfos' => $eleveurInfos,
        'personne' => $user->eleveur,
        'pays' => $this->litJson('pays'),
        'route' => $user->usertype->route,
        'vetos' => Veto::all(),
      ]);
    }

    public function update(EleveurStore $request)
    {
      $datas = $request->validated();

      // Si un autre utilisateur à déjà la même adresse email, on renvoie une erreur à la requete ajax
      $email_exist = User::where('email', $datas['email'])->where('id', '<>', $datas['id'])->count();

      if($email_exist > 0) {

        return ["erreur" => true, "message" => "Cet adresse de courriel est déjà celle d'un autre utilisateur."];

      }
      //################################################################################################

      $user = DB::table('users')->where('id', $datas['id'])
          ->update([
            'name' => $datas['name'],
            'email' => $datas['email']
          ]);

      $eleveur = DB::table('eleveurs')->where('user_id', $datas['id'])
          ->Update([
            'num' => $datas['num'],
            'address_1' => $datas['address_1'],
            'address_2' => $datas['address_2'],
            'cp' => $datas['cp'],
            'commune' => $datas['commune'],
            'pays' => $datas['pays'],
            'indicatif' => $datas['indicatif'],
            'tel' => $datas['tel'],
            'veto_id' => ($datas['veto_id'] == "null") ? null : $datas['veto_id'],

          ]);



      return ['erreur' => false];
    }

    public function demandeShow($demande_id)
    {
      $demande = Demande::findOrFail($demande_id);
      $this->authorize('view', $demande->user);

      $demande = $this->demandeFactory($demande);

      $commentaire = Commentaire::where('demande_id', $demande_id)->first();

      return view('utilisateurs.utilisateurDemandeShow', [
        'menu' => $this->menu,
        'demande' => $demande,
        'commentaire' => $commentaire,
      ]);
    }

    public function facturesIndex()
    {
      // code...
    }

    public function factureShow($id)
    {
      $facture = Facture::findOrFail($id);

      $this->authorize('view', $facture->user);

      $elementDeFacture = $this->prepareFacture($id);

      return view('utilisateurs.utilisateurFactureShow', [
        'menu' => $this->menu,
        'facture' => $facture,
        'elementDeFacture' => $elementDeFacture,
        'route' => auth()->user()->usertype->route,
      ]);
    }

    public function serieShow($serie_id)
    {
      $serie = Serie::find($serie_id);

      $this->authorize('view', $serie->user);

      foreach ($serie->demandes as $demande) {

        $demande = $this->demandeFactory($demande); // Trait DemandeFactory : ajoute attributs toutNegatif et nonDetecte aux prélèvements et met les dates à un format lisible

      }

      $serieInfos = $this->serieInfos($serie);

      return view('utilisateurs.utilisateurSerieShow', [
        'menu' => $this->menu,
        'serie' => $serie,
        'serieInfos' => $serieInfos,
      ]);
    }
}
