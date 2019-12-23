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

class UserController extends Controller
{
    use LitJson, UserTypeOutil, UserUpdateDetail;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      session()->forget('usertype');

      $users = User::all();

      $fournisseur = new ListeUsersFournisseur();

      $datas = $fournisseur->renvoieDatas($users, "Listes des utilisateurs", "users.svg", 'tableauUsers', 'user.create', "Ajouter un nouvel utilisateur");

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

      return view('admin.user.userCreate', [
        'menu' => $this->menu,
        'usertypes' => $usertypes,
        'pays' => $pays,
        'vetos' => $vetos,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

      $datas = $request->all();

      $nouvel_user = new User();

      $mdp = str_random(8);

      $nouvel_user->name = $datas['name'];
      $nouvel_user->email = $datas['email'];
      $nouvel_user->password = bcrypt($mdp);

      if(isset($datas['usertype'])) { // cas de la création d'un utilisateur indéterminé au départ

        $nouvel_user->usertype_id = $datas['usertype'];
      }
      else { // cas de la création d'un uitilisateur paticulier au départ: éleveur, veto ou labo

        $nouvel_user->usertype_id = session('usertype')->id; // on utilise la variable de SESSION
        session()->forget('usertype');
      }

      $nouvel_user->save();

      session([
        'user_id' => $nouvel_user->id,
      ]);

      return ['user' => $nouvel_user, 'mdp' => $mdp];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datas = $request->all();

        DB::table('users')->where('id', $id)
              ->Update(
                [
                  'id' => $id,
                  'name' => $datas['name'],
                  'email' => $datas['email'],
                  'password' => $datas['password'],
                  'usertype_id' => $datas['usertype_id'],
                ]);
        $this->userUpdateDetail($id, $datas);

        return redirect()->route('user.show', $id);


      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "kill the user !";
    }
}
