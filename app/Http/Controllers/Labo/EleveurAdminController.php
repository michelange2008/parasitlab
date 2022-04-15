<?php
namespace App\Http\Controllers\Labo;

use Illuminate\Http\Request;
use DB;
use Mail;
use Illuminate\Mail\Mailer;
use App\Mail\EnvoiInfosConnexion;
use App\Http\Controllers\Controller;
use App\Fournisseurs\ListeEleveursFournisseur;
use App\Fournisseurs\ListeDemandesFournisseur;
use App\Fournisseurs\ListeDemandesEleveurAdminFournisseur;

use Carbon\Carbon;
use App\User;
use App\Models\Eleveur;
use App\Models\Veto;
use App\Models\Productions\Demande;

use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;
use App\Http\Traits\EleveurInfos;
use App\Http\Traits\UserCreateDetail;

/**
*
* Contrôleur CRUD de gestion de la classe Eleveur
*
* L'intitulé ELeveurAdmin est destiné à différencier ce contrôleur de EleveurController.
* Ce dernier sert à l'affichage de la page perso Eleveur.
*
* Par rapport à un contrôler CRUD classique, celui-ci présente quelques particularités.
* La création, la suppression et la modification d'un objet Eleveur se fait en
* relation avec l'objet de la classe User auquel il est attaché:
* + __create__: Renvoie à UserController@create
* + __store__: Provient de la sous-vue admin/eleveur/eleveurCreateForm.blade.php qui s'afficha
* à la création de l'User en fonction du Usertype créé. il existe de la même façon
* un admin/veto/vetoCreateForm et un admin/labo/laboCreateForm (voir admin/user/userCreate.blade.php)
* + __update__ : la méthode n'est pas implémentées car se fait via UserController@update.
* + __destroy__ : la méthode appelle User::destroy() et la cascade fait le reste.
*
* @package Utilisateurs
* @subpackage Eleveur
*/
class EleveurAdminController extends Controller
{
  use LitJson, EleveurInfos, UserTypeOutil, UserCreateDetail;

  protected $menu;
  protected $pays;
  // protected $vetos;
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function __construct()
  {
    $this->menu = $this->litJson("menuLabo");
    $this->pays = $this->litJson("pays");
    $this->vetos = Veto::all();
  }

  /**
  * Affiche la liste des eleveurs
  *
  * Recours comme dans tous les cas à une classe héritée de ListeFournisseur
  *
  * @return \Illuminate\View\View admin/index/pageIndex
  */
  public function index()
  {
    session()->forget(['creation']); // on supprime les variables de sessions liées à la création d'une demande ou d'un user

    $users = User::where('usertype_id', $this->userTypeEleveur()->id)->get();

    $icone = $this->userTypeEleveur()->icone->nom;

    $fournisseur = new ListeEleveursFournisseur(); // voir class ListeFournisseur

    $datas = $fournisseur->renvoieDatas($users, __('titres.list_eleveurs'), $icone, 'tableauEleveurs', 'eleveurAdmin.create', __('boutons.add_eleveur'));

    return view('admin.index.pageIndex', [
    'menu' => $this->menu,
    'datas' => $datas,
    'userType_nom' => $this->userTypeEleveur()->nom,
    ]);

  }

  /**
  * Renvoie à UserController@create après avoir créer des variables de session pour
  * savoir quel type d'User on crée
  *
  * @return redirect UserController@create
  */
  public function create()
  {

    session([
    'creation.usertype' => $this->userTypeEleveur(),
    'creation.route_retour' => 'eleveurAdmin.show',
    ]);

    return redirect()->route('user.create');

  }

  /**
  * Enregistrement de Eleveur après préparation de l'enregistrement de User
  * (cf. admin/eleveur/eleveurCreateForm.blade.php)
  *
  * On commence par enregistrer le nouvel User sur la base des variables de session
  * Puis on fait appel au trait eleveurCreateDetail pour enregistrer l'Eleveur.
  * Et on envoie aussi un mail au nouvel eleveur créé pour l'informer de sa création
  * et lui transmettre son mot de passe.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return dépend des variables de sessions qui disent dans quel contexte le nouvel
  * Eleveur a été créé: création d'un User, creation d'une Demande ou s'il faut aussi créer un Veto
  */
  public function store(Request $request)
  {
    $datas = $request->all();

    // Le nouvel utilisateur créé n'est pas encore enregistré
    // (méthode pour éviter de créer un user sans les users spécifiques (labo, veto, éleveur)
    // si le formulaire n'est pas rempli juqu'au bout)
    // On le récupère par la variable de session.
    $nouvel_user = session('creation.nouvel_user');

    session()->forget(['creation.nouvel_user']);

    // On crée le mot de passe (maintenant et non dans UserController pour ne pas pas avoir à le stoker en session)
    $mdp = str_random(8);
    $nouvel_user->password = $mdp; // On stocke d'abord le mdp sous bcrypt pour pouvoir l'envoyer par mail

    //Envoyer au nouvel utilisateur ses identifants de connexion
    $mail = Mail::to($nouvel_user->email)->send(new EnvoiInfosConnexion($nouvel_user));

    // Puis on crypte le mdp avant de la stocker en base de donnée
    $nouvel_user->password = bcrypt($mdp);
    // Et on l'enregistre
    $nouvel_user->save();

    //Puis on fait appel au trait UserCreateDetail pour vérifier et enregistrer l'éleveur correspondant
    $this->eleveurCreateDetail($datas, $nouvel_user->id);

    session(['creation.user' => $nouvel_user]);
    // si le veto_id == 0, c'est qu'il faut créer un nouveau veto
    if($datas['veto_id'] === "0") {

      session(['creation.veto_d_eleveur' => true]);

      session(['creation.usertype' => $this->userTypeVeto()]);

      return redirect()->route('user.create')->with('status', __('message.create_new_vet').'&nbsp;'.$nouvel_user->name);

      // Cas où la création de l'éleveur se fait dans le cadre d'une demande d'analyse
    } elseif (session('creation.demande_en_cours')) {

      session(['creation.user' => $nouvel_user]); // On rajoute le nouvel user en session pour qu'il soit choisi par défaut dans la liste déroulante

      return redirect()->route('demandes.create'); // Et on renvoie au formulaire de création d'une nouvelle demande

      // sinon on peut revenir à la route de retour
    } else {

      session()->forget(['usertype', 'user_id']); // après avoir vidé les infos passées en session

      return redirect()->route('eleveurAdmin.show', $nouvel_user->id);

    }
    // TODO: Quel intêret de la valeur en session route_retour ?
  }

  /**
  * Affiche les données synthétiques de l'éleveur et l'ensemble de ses demandes d'analyse
  *
  * D'où le recours à ListeDemandesEleveurAdminFournisseur qui permet de faire le
  * tableau des demandes d'analyses d'une éleveur donné
  *
  * @param  int  $id Id de l'User correspondant à cet éleveur (et non id de l'objet Eleveur)
  * @return \Illuminate\View\View admin/eleveurShow
  */
  public function show($id)
  {
    session()->forget(['creation']);

    $user = User::find($id);

    session(['creation.user_eleveur' => $user]);

    $user = $this->eleveurFormatNumber($user);
    // Ci-dessous méthode un peu limite pour créer une ligne vide d'infos sur l'user
    // eleveur s'il n'existe pas... avec un trait EleveurInfos
    $user = $this->eleveurNul($user);

    $eleveurInfos = $this->eleveurInfos($user);

    $demandes = Demande::where('user_id', $id)->orderBy('date_reception', 'desc')->get();

    $fournisseur = new ListeDemandesEleveurAdminFournisseur(); // voir class ListeFournisseur

    $datas = $fournisseur->renvoieDatas($demandes, __('titres.list_demandes'), 'demandes.svg', 'tableauDemandesEleveurAdmin', 'demandes.create', __('boutons.add_demande'));

    return view('admin.eleveurShow', [
    'menu' => $this->menu,
    'user' => $user,
    'eleveurInfos' => $eleveurInfos,
    'datas' => $datas,
    'pays' => $this->pays,
    ]);
  }

  /**
  * Affiche un formulaire pour modifier l'Eleveur
  *
  * @param  int  $id Id du User correspondant
  * @return \Illuminate\View\View admin/eleveur/eleveurShow
  */
  public function edit($id)
  {
    $user =User::find($id);

    $vetos = Veto::where('id', '<>', $user->eleveur->veto_id)->get();

    session(['creation.route_retour' => 'eleveurAdmin.show']);

    return view('admin.eleveur.eleveurEdit', [
    'menu' => $this->menu,
    'user' => $user,
    'pays' => $this->pays,
    'vetos' => $vetos

    ]);


  }

  /**
  * ON IMPLEMENTEE CAR UTILISATION DE user.update + le trait UserUpdateDetail
  */
  public function update(Request $request, $id)
  {
    //
  }
  /**
  * Supprimer l'User correspondant à l'Eleveur
  *
  * @param  int  $id Id de l'User
  * @return redirect EleveurAdminController@index
  */
  public function destroy($id)
  {
    // Si l'user détruit possède des demandes d'analyses, il faut les transférées à l'user anonyme
    $demandes= Demande::where('user_id', $id)->get();

    if($demandes->count() > 0) {

      foreach ($demandes as $demande) {

        $demande->user_id = 0;
        $demande->save();

      }
    }

    User::destroy($id);

    return redirect()->route('eleveurAdmin.index')->with('message', 'user_suppr');
  }
}
