<?php
namespace App\Http\Controllers\Labo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Mail\Mailer;
use App\Mail\EnvoiInfosConnexion;
use App\Fournisseurs\ListeLabosFournisseur;

use App\User;
use App\Models\Labo;


use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;
use App\Http\Traits\UserUpdateDetail;
use App\Http\Traits\UserCreateDetail;
use App\Http\Traits\ImagesManager;

/**
* Controller destiné à gérer la classe Labo: User avec tous les droits
*
* Contrôleur CRUD avec quelques particularités liées au fait que un Labo est d'abord
* un User avec un Usertype _laboratoire_
*
* @see \App\Models\Labo
*
* @package Utilisateurs
* @subpackage Labo
*/
class LaboAdminController extends Controller
{

  use LitJson, UserTypeOutil, UserUpdateDetail, UserCreateDetail, ImagesManager
    {
      ImagesManager::supprImage insteadof UserUpdateDetail;
    }

  protected $menu;
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('labo');

      $this->menu = $this->litJson('menuLabo');
  }

  /**
   * Affiche la liste des User de usertype Labo
   *
   * Recours à une classe héritée de ListeFournisseur (ListeLabosFournisseur)
   *
   * @return \Illuminate\View\View admin/index/pageIndex
   */
  public function index()
  {
    session()->forget(['creation']);

    $users = User::where('usertype_id', $this->userTypeLabo()->id)->get();

    $icone = $this->userTypeLabo()->icone->nom;

    $fournisseur = new ListeLabosFournisseur(); // voir class ListeFournisseur

    $datas = $fournisseur->renvoieDatas($users, __('titres.list_labo'), $icone, 'tableauLabos', 'laboAdmin.create', __('boutons.add'));

    return view('admin.index.pageIndex', [
      'menu' => $this->menu,
      'datas' => $datas,
      'userType_nom' => $this->userTypeLabo()->nom,
    ]);

  }

  /**
   * Renvoie à UserController@create avec une variable de session pour expliquer
   * qu'il s'agit d'un usertype laboratoire.
   *
   * @return redirect UserController@create
   */
  public function create()
  {
      session(['creation.usertype' => $this->userTypeLabo()]);

      return redirect()->route('user.create');
  }

  /**
  * Enregistrement de Labo après préparation de l'enregistrement de User
  * (cf. admin/eleveur/laboCreateForm.blade.php)
  *
  * On commence par enregistrer le nouvel User sur la base des variables de session
  * Puis on fait appel au trait __UserCreateDetail@aboCreateDetail__ pour enregistrer le labo.
  * Et on envoie aussi un mail au nouvel labo créé pour l'informer de sa création
  * et lui transmettre son mot de passe.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return redirect LaboAdminController@index
   */
  public function store(Request $request)
  {
    $datas = $request->all();

    // Le nouvel utilisateur créer n'est pas encore enregistré
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


    //Puis on fait appel au trait UserCreateDetail pour vérifier et enregistrer le labo correspondant
    $this->laboCreateDetail($datas, $nouvel_user->id); // Méthode dans le trait UserCreateDetail

    return redirect()->route('laboAdmin.index');

  }
  /**
   * Affiche le détail d'un Labo
   *
   * @param  int  $id Id de l'User (et non du Labo)
   * @return \Illuminate\View\View admin/show/laboShow
   */
  public function show($id)
  {
      session()->forget(['creation']);

      return view('admin.labo.laboShow', [
        'menu' => $this->menu,
        'user' => User::find($id),
      ]);
  }

  /**
   * Affichel le formulaie pour la modification d'un Labo
   *
   * @param  int  $id Id de l'User
   * @return \Illuminate\View\View admin/labo/laboEdit
   */
  public function edit($id)
  {
      $user = User::where('id', $id)->first();

      //STOCKE EN SESSION L'ADRESSE DE RETOUR APRÈS LA MODIFICATION DE L'UTILISATEUR
      session(['creation.route_retour' => 'laboAdmin.index']);

      return view('admin.labo.laboEdit', [
        'menu' => $this->menu,
        'user' => $user,
      ]);
  }

  /**
   * NON IMPLEMENTEE CAR UTILISATION DE user.update + le trait UserUpdateDetail
   */
  public function update(Request $request, $id)
  {

    // NON IMPLEMENTEE CAR UTILISATION DE user.update + le trait UserUpdateDetail

  }

  /**
   * Suppression d'un Labo
   *
   * Cela se fait pas suppression de l'User (et impact de la cascade liée à la
   * relation dans la BDD) mais il faut avant cela effacer le fichier image
   * correspondant pour éviter les accumulations.
   *
   * @see \App\Traits\ImageManager
   *
   * @param  int  $id Id de l'User
   * @return redirect LaboAdminController@index
   */
  public function destroy($id)
  {
      $user = User::find($id);

      // Suppression de la photo et de la signature quand on supprime un utilisateur laboratoire
      if($user->usertype->id == $this->userTypeLabo()->id)
      {
        if($user->labo->photo !== 'default.jpg')
        {
          $this->supprImage('storage/img/labo/photos/'.$user->labo->photo); // Trait ImagesManager
        }

        if($user->labo->signature !== 'default.svg')
        {
          $this->supprImage('storage/img/labo/signatures/'.$user->labo->signature);

        }

      }

      User::destroy($id);

      return redirect()->route('laboAdmin.index')->with('message', 'user_suppr' );
  }
}
