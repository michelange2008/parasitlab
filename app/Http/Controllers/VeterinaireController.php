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
 * [VeterinaireController description]
 *
 * @package Utilisateurs
 * @subpackage Vetos
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
