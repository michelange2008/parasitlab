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

/**
* Controller destiné à gérer tout ce qui a trait à l'administration du site
*/


class LaboAdminController extends Controller
{

  use LitJson, UserTypeOutil, UserUpdateDetail;

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
    $users = User::where('usertype_id', $this->userTypeLabo()->id)->get();

    $icone = $this->userTypeLabo()->icone->nom;

    $fournisseur = new ListeLabosFournisseur(); // voir class ListeFournisseur

    $datas = $fournisseur->renvoieDatas($users, "Membres du laboratoire", $icone, 'tableauLabos', 'laboAdmin.create', "Ajouter");

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
    // dd($datas);
    $user = User::find($datas['user_id']);

    $nouveau_labo = Labo::firstOrCreate(['user_id' => $datas['user_id']]);

    $this->laboUpdateDetail($user, $datas);

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
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
