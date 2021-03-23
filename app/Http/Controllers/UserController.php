<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Fournisseurs\ListeUsersFournisseur;
use App\Http\Requests\UserRequest;

use App\User;
use App\Models\Usertype;
use App\Models\Veto;

use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;
use App\Http\Traits\UserUpdateDetail;

/**
 * Contrôleur pour le modèle User
 *
 * En théorie, ce devrait être un contrôler CRUD de base.
 *
 * En pratique c'est beaucoup plus compliqué pour plusieurs raisons:
 * + __A la création__: Lors qu'un nouvel User est créé, il faut aussi créer le
 * usertype correspondant: labo, veterinaire ou eleveur.
 * + __A la suppression__: Le User n'est pas supprimer mais anonymiser de façon à
 * ne pas perdre les résultats d'analyses.
 *
 * @see RouteurController
 *
 * @package Utilisateurs
 */
class UserController extends Controller
{
    use LitJson, UserTypeOutil, UserUpdateDetail;

    /**
     * @var array éléments pour le menu à afficher
     */
    protected $menu;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->menu = $this->litJson("menuLabo");
    }
    /**
     * Display a listing of the resource.
     *
     * C'est assez classique à part le recours (comme pour les tous affichages
     * d'une resource) à un Fournisseur, dans ce cas ListeUsersFournisseur qui
     * produit les données.
     * @see \App\Fournisseurs\ListeUsersFournisseur
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      session()->forget(['creation']); // on supprime les variables de sessions liées à la création d'une demande ou d'un user

      $users = User::all();

      $fournisseur = new ListeUsersFournisseur();

      $datas = $fournisseur->renvoieDatas($users, __('titres.list_users'), "users.svg", 'tableauUsers', 'user.create', __('boutons.add_user'));

        return view('admin.index.pageIndex', [
          'menu' => $this->menu,
          'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $usertypes = Usertype::all();

      $pays = $this->litJson('pays');

      $vetos = Veto::all();

      session(['creation.route_retour' => 'usershow']);

      return view('admin.user.userCreate', [
        'menu' => $this->menu,
        'usertypes' => $usertypes,
        'pays' => $pays,
        'vetos' => $vetos,
      ]);
    }

    /**
     * Stockage d'un nouvel utilisateur.
     *
     * Mais en fait, il s'agit simplement de stocker les informations et de
     * les renvoyer à la requête Ajax pour continuer la création du User.
     *
     * @see \resources\js\createUser.js
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

      $datas = $request->all();
      $nouvel_user = new User();


      $nouvel_user->name = $datas['name'];
      $nouvel_user->email = $datas['email'];

      if(isset($datas['usertype'])) { // cas de la création d'un utilisateur indéterminé au départ

        $nouvel_user->usertype_id = $datas['usertype'];
      }
      else { // cas de la création d'un utilisateur particulier au départ: éleveur, veto ou labo

        $nouvel_user->usertype_id = session('creation.usertype')->id; // on utilise la variable de SESSION

        session()->forget('creation.usertype');

      }
      // TODO: ENREGISTRER LE NOUVEL USER SEULEMENT JUSTE AVANT L ENREGISTREMENT DE VETO LABO OU ELEVEUR
      // $nouvel_user->save();

      session([
        'creation.nouvel_user' => $nouvel_user,
      ]);
      // RENVOI DES INFORMATIONS POUR LA REQUETE ajax cf. create.js
      return ['usertype' => $nouvel_user->usertype];

    }

    /**
     * Affiche les infos sur le User mais renvoie une vue différente en fonction
     * du Usertype.
     *
     * @param  int  $id Id de l'User
     * @return \Illuminate\View\View xxxAdmin.show
     */
    public function show($id)
    {
      session()->forget(['creation']); // on supprime les variables de sessions liées à la création d'une demande ou d'un user

      $user = User::select('usertype_id')->where('id', $id)->first();

      if($this->estVeto($user->usertype_id))
      {

        return redirect()->route('vetoAdmin.show', $id);

      }

      elseif ($this->estEleveur($user->usertype_id))
      {

        return redirect()->route('eleveurAdmin.show', $id);

      }

      elseif ($this->estLabo($user->usertype_id))
      {

        return redirect()->route('laboAdmin.show', $id);

      }
    }

    /**
     * Permet de modifier l'User en renvoyant une vue mais cette vue dépend du
     * Usertype
     *
     * @param  int  $id Id de l'User
     * @return \Illuminate\View\View xxxAdmin.edit
     */
    public function edit($id)
    {
        $user = User::select('usertype_id')->where('id', $id)->first();

        if($this->estVeto($user->usertype_id))
        {

          return redirect()->route('vetoAdmin.edit', $id);

        }

        elseif ($this->estEleveur($user->usertype_id))
        {

          return redirect()->route('eleveurAdmin.edit', $id);

        }

        elseif ($this->estLabo($user->usertype_id))
        {

          return redirect()->route('laboAdmin.edit', $id);

        }
    }

    /**
     * Stocke la modification faite sur l'User
     *
     * Si l'User est un éleveur est que la modification se traduit par la création
     * d'un nouveau vétérinaire, il faut renvoyer la vue correspondantes
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datas = $request->all();

        $user = User::find($id);

        DB::table('users')->where('id', $id)
              ->Update(
                [
                  'id' => $id,
                  'name' => $datas['name'],
                  'email' => $datas['email'],
                  'usertype_id' => $datas['usertype_id'],
                ]);

        $this->userUpdateDetail($user, $datas); // On met à jour les infos spécifiques à l'utilisateur via le trait

        if($this->estEleveur($datas['usertype_id']) && $datas['veto_id'] === "0") // s'il faut créer un nouveau veto
        {

          session(['creation.veto_d_eleveur' => true]);

          return redirect()->route('vetoAdmin.create');
        }

        if(session()->has('creation.route_retour') !== null) { // S'il existe une variable de session route_retour

          return redirect()->route(session('creation.route_retour'), $id); // on y va
        }

        else {

          return redirect()->route('user.index'); // sinon on revient à la liste utilisateurs

        }

      }

    /**
     * Remove the specified resource from storage.
     *
     * TODO: alors pourquoi l'anonymisation dans RouteurController@jemedelete()
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        User::destroy($id);

        return redirect()->route('user.index')->with('status', 'Cet utilisateur a été supprimé');

    }

    /**
     * Route post pour recueillir le consentement des User sur leur page perso
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function consentement(Request $request)
    {

      $datas = $request->all();

      $user_id = $datas['user_id'];
      $consentement = $datas['consentement'];

      $user = User::find($user_id);
      $etat = abs($user->$consentement -1);
      $user->$consentement = $etat;
      $user->save();

      return $user->$consentement;

    }
}
