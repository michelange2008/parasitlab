<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Fournisseurs\ListeUsersFournisseur;

use App\User;
use App\Models\Usertype;

use App\Http\Traits\LitJson;
use App\Http\Traits\QuelUsertype;

class UserController extends Controller
{
    use LitJson, QuelUsertype;

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

      $users = User::where('usertype_id', '<>', 2)->get();

      $fournisseur = new ListeUsersFournisseur();

      $datas = $fournisseur->renvoieDatas($users, "Listes des utilisateurs", "users.svg", 'tableauUsers');

        return view('admin.userIndex', [
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
      $usertypes = Usertype::where('nom', '<>', auth()->user()->usertype->nom)->get();

        return view('admin.userCreate', [
          'menu' => $this->menu,
          'usertypes' => $usertypes,
        ]);
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

      $usertype = Usertype::where('nom', $datas['usertype'])->first();
      $nouvel_user = new User();

      $nouvel_user->name = $datas['name'];
      $nouvel_user->email = $datas['email'];
      $nouvel_user->password = bcrypt("!".explode('@', $datas['email'])[0]."%");
      $nouvel_user->usertype_id = $usertype->id;

      $nouvel_user->save();

      if ($this->estEleveur($usertype->id)) {
        return redirect()->route('eleveurAdmin.create', [
          'user_id' => $nouvel_user->id,
        ]);
      }
      elseif($this->estVeto($usertype->id)) {
        return redirect()->route('vetoAdmin.create', [
          'user_id' => $nouvel_user->id,
        ]);
      }
      else {
        return "Y a un problème";
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        switch ($user->userType->nom) {

          case 'vétérinaire':

            return redirect()->route('vetoAdmin.show', $id);

            break;

          case 'éleveur':

              return redirect()->route('eleveurAdmin.show', $id);

              break;

          default:

            echo "à faire";

            break;
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
        //
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
// dd($datas['ede']);
        DB::table('users')->where('id', $id)
              ->Update(
                [
                  'id' => $id,
                  'name' => $datas['name'],
                  'email' => $datas['email'],
                  'password' => $datas['password'],
                  'usertype_id' => $datas['usertype_id'],
                ]);

        if($this->estVeto($datas['usertype_id'])) {
          return redirect()->route('vetoAdmin.update', ['id' => $id, 'request' => $request]);
        }
        elseif ($this->estEleveur($datas['usertype_id'])) {

          DB::table('eleveurs')->where('user_id', $id)
                ->Update([
                  'user_id' => $id,
                  'ede' => $datas['ede'],
                  'address_1' => $datas['address_1'],
                  'address_2' => $datas['address_2'],
                  'cp' => $datas['cp'],
                  'commune' => $datas['commune'],
                  'pays' => $datas['pays'],
                  'indicatif' => $datas['indicatif'],
                  'tel' => $datas['tel'],
                  'veto_id' => $datas['veto_id'],
                ]);
          return redirect()->route('eleveurAdmin.show', $id);
        }

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
