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
* Controller destiné à gérer tout ce qui a trait à l'administration du site
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
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    session()->forget(['user_id', 'encreation', 'user', 'vetoDeleveur', 'usertype']);

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
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      session(['usertype' => $this->userTypeLabo()]);

      return redirect()->route('user.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $datas = $request->all();

    // Le nouvel utilisateur créer n'est pas encore enregistré
    // (méthode pour éviter de créer un user sans les users spécifiques (labo, veto, éleveur)
    // si le formulaire n'est pas rempli juqu'au bout)
    // On le récupère par la variable de session.
    $nouvel_user = session('nouvel_user');
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
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      return view('admin.labo.laboShow', [
        'menu' => $this->menu,
        'user' => User::find($id),
      ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $user = User::where('id', $id)->first();

      //STOCKE EN SESSION L'ADRESSE DE RETOUR APRÈS LA MODIFICATION DE L'UTILISATEUR
      session(['route_retour' => 'laboAdmin.index']);

      return view('admin.labo.laboEdit', [
        'menu' => $this->menu,
        'user' => $user,
      ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {

    // NON IMPLEMENTEE CAR UTILISATION DE user.update + le trait UserUpdateDetail

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
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
