<?php

namespace App\Http\Controllers\Labo;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Eleveur;
use App\Models\Veto;

use App\Http\Traits\LitJson;


class EleveurAdminController extends Controller
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
      // $eleveurs = DB::table('users')->join('eleveurs', 'user_id', '=', 'users.id')
      //                               ->get();
      $eleveurs = Eleveur::all();
      foreach ($eleveurs as $key => $eleveur) {
        $analyses = Demandes::where('user_id', $eleveur->id)->get();
        $eleveurs[$key]
      }
      $eleveurs_analyse = DB::table('users')->join('eleveurs', 'user_id', '=', 'users.id')
                                    ->leftjoin('demandes', 'demandes.user_id', '=', 'users.id')->get();

      // $eleveurs = DB::table('demandes')->join('users', 'users.id', '=', 'user_id' )
      //                                   ->join('eleveurs', 'eleveurs.user_id', '=', 'users.id')
      //                                   ->groupBy('demandes.user_id')
      //                                   ->get();
      // $analyses = DB::table('demandes');
      //
      // $eleveurs = DB::table('users')->joinSub($analyses, 'analyses', function($join){
      //   $join->on('users.id','=', 'analyses.user_id')->get();
      // });


      dd($eleveurs);

      return view('admin.eleveurIndex');



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // RECUPERE L'ID DU USER QUI VIENT D'ETRE ENREGISTREE VIA LE GET

        return view('labo.eleveurCreate', [
          'menu' => $this->menu,
          'user' => User::find($_GET['user_id']),
          'vetos' => Veto::all(),
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

        $nouvel_eleveur = new Eleveur();

        $nouvel_eleveur->user_id = $datas['user_id']; // Passer en input type hidden
        $nouvel_eleveur->ede = $datas['ede'];
        $nouvel_eleveur->address_1 = $datas['address_1'];
        $nouvel_eleveur->address_2 = $datas['address_2']; // peut être null
        $nouvel_eleveur->cp = $datas['cp'];
        $nouvel_eleveur->commune = $datas['commune'];
        $nouvel_eleveur->pays = $datas['pays'];
        $nouvel_eleveur->indicatif = $datas['indicatif'];
        $nouvel_eleveur->tel = $datas['tel'];
        $nouvel_eleveur->veto_id = $datas['veto_id'];

        $nouvel_eleveur->save();

        return redirect()->route('user.index');
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
