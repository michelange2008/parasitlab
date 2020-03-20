<?php
namespace App\Http\Controllers\Labo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fournisseurs\ListeLabosFournisseur;

use App\User;
use App\Models\Labo;


use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;
use App\Http\Traits\UserUpdateDetail;
use App\Http\Traits\UserCreateDetail;

/**
* Controller destiné à gérer tout ce qui a trait à l'administration du site
*/


class LaboAdminController extends Controller
{

  use LitJson, UserTypeOutil, UserUpdateDetail, UserCreateDetail;

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

    $datas = $fournisseur->renvoieDatas($users, "Membres du laboratoire", $icone, 'tableauLabos', 'laboAdmin.create', "Ajouter");

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
    // Et on l'enregistre
    $nouvel_user->save();

    // TODO: Envoyer au nouvel utilisateur ses identifants de connexion

    //Puis on fait appel au trait UserCreateDetail pour vérifier et enregistrer le labo correspondant
    $this->laboCreateDetail($datas, $nouvel_user->id);

    return redirect()->route('laboAdmin.show', $nouvel_user->id);

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
      session(['route_retour' => 'laboAdmin.show']);

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
      User::destroy($id);

      return redirect()->route('laboAdmin.index')->with('message', 'user_suppr' );
  }
}
