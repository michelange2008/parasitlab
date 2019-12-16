<?php
namespace App\Http\Controllers\Labo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fournisseurs\ListeVetosFournisseur;
use App\Fournisseurs\ListeDemandesVetoFournisseur;

use App\Models\Veto;
use App\Models\Productions\Demande;
use App\User;

use App\Http\Traits\LitJson;
use App\Http\Traits\VetoInfos;
use App\Http\Traits\UserTypeOutil;

class VetoAdminController extends Controller
{

  use LitJson, VetoInfos, UserTypeOutil;

  protected $menu;

    public function __construct()
    {
        $this->middleware('auth');

        $this->menu = $this->litJson('menuLabo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vetos = Veto::all();

        $icone = $vetos[0]->user->userType->icone->nom;

        $fournisseur = new ListeVetosFournisseur();

        $datas =$fournisseur->renvoiedatas($vetos, 'liste des vétérinaires', $icone, 'tableauVetos');

        return view('admin.index.pageIndex', [
          'menu' => $this->menu,
          'datas' => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        return "création d'un nouveau véto";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $user = $this->vetoUser($user);

        $vetoInfos = $this->vetoInfos($user);

        $demandes = Demande::where('veto_id', $user->veto->id)->orderBy('date_reception', 'desc')->get();

        $fournisseur = new ListeDemandesVetoFournisseur(); // voir class ListeFournisseur

        $datas = $fournisseur->renvoieDatas($demandes, "liste des demandes d'analyse", 'demandes.svg', 'tableauDemandesVeto');

        return view('admin.vetoShow', [
          'menu' => $this->menu,
          'user' => $user,
          'vetoInfos' => $vetoInfos,
          'datas' => $datas,
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
        $user = User::where('usertype_id', $this->userTypeVeto()->id)
                      ->where('id', $id)->first();

        $pays = $this->litJson('pays');

        return view('admin.veto.vetoEdit', [
          'menu' => $this->menu,
          'user' => $user,
          'pays' => $pays,
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
