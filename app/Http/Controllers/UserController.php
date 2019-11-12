<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\LitJson;
use App\User;
use App\Models\Usertype;

class UserController extends Controller
{
    use LitJson;

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
        return view('admin.userIndex', [
          'menu' => $this->menu,
          'users' => User::where('usertype_id', '<>', 2)->get(),
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

      if ($usertype->route === 'eleveur') {
        return redirect()->route('eleveurAdmin.create', [
          'user_id' => $nouvel_user->id,
        ]);
      }
      elseif($usertype->route === 'veterinaire') {
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
        //
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
