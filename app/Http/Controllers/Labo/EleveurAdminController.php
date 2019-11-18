<?php

namespace App\Http\Controllers\Labo;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\User;
use App\Models\Eleveur;
use App\Models\Veto;
use App\Models\Productions\Demande;

use App\Http\Traits\LitJson;
use App\Http\Traits\FormatEde;
use App\Http\Traits\FormatTel;

class EleveurAdminController extends Controller
{
    use LitJson, FormatEde, FormatTel;

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
      $intitules = $this->litJson("tableauEleveurs");

      $eleveurs = Eleveur::all();

      return view('admin.eleveurIndex', [
        'menu' => $this->menu,
        'intitules' => $intitules,
        'eleveurs' => $eleveurs,
      ]);



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
        $user = User::find($id);

        $user->eleveur->ede = $this->edeAvecEspace($user->eleveur->ede);
        $user->eleveur->tel = $this->ajouteEspaceTel($user->eleveur->tel);

        $analyses = Demande::where('user_id', $id)->orderBy('reception', 'desc')->get();

        $vetos = Veto::where('id', '<>', $user->eleveur->veto_id)->get();

        $pays = $this->litJson("pays");

        return view('admin.eleveurShow', [
          'menu' => $this->menu,
          'user' => $user,
          'vetos' => $vetos,
          'analyses' => $analyses,
          'pays' => $pays,
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
      return "coucou eleveur";
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
