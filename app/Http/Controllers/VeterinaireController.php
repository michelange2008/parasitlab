<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests\VetoStore;

use App\Http\Traits\LitJson;
use App\Http\Traits\DemandeFactory;
use App\Http\Traits\SerieInfos;
use App\Http\Traits\VetoInfos;

use App\Models\Productions\Demande;
use App\Models\Productions\Serie;
use App\User;

use App\Fournisseurs\ListeDemandesVetoFournisseur;

/**
 * Contrôleur destiné à gérer les page perso des vétérinaires (par eux-mêmes)
 *
 * Ce n'est pas un contrôler CRUD du modèle Veto. Pour cela voir la classe VetoAdminController
 * @see Labo\VetoAdminController
 *
 * A différencier du contrôler VetoAdminController destiné à gérer les vétérinaires
 * par des membres de Labo.
 *
 * @package Utilisateurs
 * @subpackage Veto
 */
class VeterinaireController extends Controller
{

  use LitJson, VetoInfos, SerieInfos, DemandeFactory;

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

      $this->middleware('auth');
      $this->middleware('veto');

    }

    /**
     * Renvoie une page qui liste l'ensemble des demandes d'analyse concernant le
     * veterinaire authentifié
     *
     * Utiise la classe ListeDemandesVetoFournisseur qui est elle-même héritée de
     * la classe abstraite ListeFournisseurs
     * @see \App\Fournisseurs\ListeDemandesVetoFournisseur
     *
     * @return \Illuminate\View\View utilisateurs/index.blade.php
     */
    public function index()
    {
      $user = User::find(auth()->user()->id);

      $demandes = Demande::where('tovetouser_id', auth()->user()->veto->id)->get();

      foreach ($demandes as $demande) {

        $demande = $this->demandeFactory($demande);

      }

      $fournisseur = new ListeDemandesVetoFournisseur();

      $datas = $fournisseur->renvoieDatas($demandes, __('titres.list_demandes'), 'demandes.svg', 'tableauDemandesVeto', 'demandes.create', __('boutons.add_demande'));

      return view('utilisateurs.index', [
        'menu' => $this->menu,
        'demandes' => $demandes,
        'route' => $user->usertype->route,
        'datas' => $datas,
        'user' => auth()->user(),
      ]);

    }

    /**
     * Met à jour les informations personnelles du vétérinaire
     *
     * Cette fonction est appelée par une fonction javascript: js/infosPerso_modif.js
     * Cette fonction renvoie le les données du formulaire dans une requête Ajax POST
     * et attends juste qu'il n'y ai pas d'erreur dans le retour. Cette erreur pouvant
     * provenir d'un doublon dans les emails.
     *
     * Utilisation de VetoStore pour valider le forumaire
     *
     * @see \App\Requests\VetoStore
     *
     * @param  VetoStore $request validation du formulaire
     * @return $veto + $user = résultat de la mise à jour de l'User de de son Usertype.
     * En cas de problème avec cette mise à jour, la méthode renvoie une erreur au js
     */
    public function update(VetoStore $request)
    {
      $datas = $request->validated();

      // Si un autre utilisateur à déjà la même adresse email, on renvoie une erreur à la requete ajax
      $email_exist = User::where('email', $datas['email'])->where('id', '<>', $datas['id'])->count();

      if($email_exist > 0) {

        return ["erreur" => true];

      }
      //################################################################################################

      $user = DB::table('users')->where('id', $datas['id'])
          ->update([
            'name' => $datas['name'],
            'email' => $datas['email']
          ]);

      $veto = DB::table('vetos')->where('user_id', $datas['id'])
          ->update([
            'num' => $datas['num'],
            'address_1' => $datas['address_1'],
            'address_2' => $datas['address_2'],
            'cp' => $datas['cp'],
            'commune' => $datas['commune'],
            'pays' => $datas['pays'],
            'indicatif' => $datas['indicatif'],
            'tel' => $datas['tel'],
          ]);


      return $user + $veto;
    }

    /**
     * Renvoie l'affichage d'une vue qui présente les infos perso au véto
     *
     * L'utilisation de la variable _$personne_ permet de n'utiliser les mêmes vues
     * pour Veto que pour Eleveur.
     *
     * @param  int $id Id de l'User
     * @return \Illuminate\View\View utilisateurs/utilisateurShow
     */
    public function show($id)
    {
      $user = User::find($id);

      $this->authorize('view', $user);

      $vetoInfos = $this->vetoInfos($user); // Ajoute les nombres de demande (et plus tard peut-être d'autres infos)

      return view('utilisateurs.utilisateurShow', [
        'menu' => $this->menu,
        'user' => $user,
        'vetoInfos' => $vetoInfos,
        'personne' => $user->veto,
        'route' => $user->usertype->route,
        'pays' => $this->litJson('pays'),
      ]);
    }

    /**
     * Renvoie une vue avec la demande d'analyse dont l'Id est fournie à condition
     * qu'elle existe
     *
     * @param  int $demande_id Id de la demande d'analyse
     * @return \Illuminate\View\View utilisateurs.utilisateurDemandeShow
     */
    public function demandeShow($demande_id)
    {

      $demande = Demande::where('id', $demande_id)->where('veto_id', auth()->user()->veto->id)->first();

      if(!isset($demande)) {

        abort(403);

      }

      $demande = $this->demandeFactory($demande);

      return view('utilisateurs.utilisateurDemandeShow', [
        'menu' => $this->menu,
        'demande' => $demande,
      ]);
    }


    /**
     * Renvoie une vue avec la serie d'analyse dont l'Id est fournie à condition
     * qu'elle existe
     *
     * @param  int $demande_id Id de la serie d'analyse
     * @return \Illuminate\View\View utilisateurs.utilisateurSerieShow
     */
    public function serieShow($serie_id)
    {

      $demande = Demande::where('serie_id', $serie_id)->where('veto_id', auth()->user()->veto->id)->first();

      if(!isset($demande)) {

        abort(403);

      }

      $serie = $demande->serie;

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
// TODO: Comment faire avec le "aucun vétérinaire"
