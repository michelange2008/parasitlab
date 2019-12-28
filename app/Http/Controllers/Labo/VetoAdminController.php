<?php
namespace App\Http\Controllers\Labo;

use DB;
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
  protected $pays;

    public function __construct()
    {
        $this->middleware('auth');

        $this->menu = $this->litJson('menuLabo');

        $this->pays = $this->litJson('pays');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->forget(['user_id', 'encreation', 'user', 'vetoDeleveur', 'usertype']);

        $users = User::where('usertype_id', $this->userTypeVeto()->id)->get();

        $icone = $this->userTypeVeto()->icone->nom;

        $fournisseur = new ListeVetosFournisseur();

        $datas =$fournisseur->renvoiedatas($users, 'liste des vétérinaires', $icone, 'tableauVetos', 'vetoAdmin.create', "Ajouter un vétérinaire");

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
    public function create()
    {

      session(['usertype' => $this->userTypeVeto()]);

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

        $nouveau_veto = Veto::firstOrNew(['user_id' => $datas['user_id']]);

        $nouveau_veto->address_1 = $datas['address_1'];

        $nouveau_veto->address_2 = $datas['address_2'];

        $nouveau_veto->cp = $datas['cp'];

        $nouveau_veto->commune = $datas['commune'];

        $nouveau_veto->pays = $datas['pays'];

        $nouveau_veto->indicatif = ($datas['indicatif'] === null) ? 33 : $datas['indicatif'];

        $nouveau_veto->tel = $datas['tel'];

        $nouveau_veto->num = ($datas['num'] === null) ? "" : $datas['num'];

        $nouveau_veto->save();

        // CAS OU LA CREATION D'UN VETO SE FAIT À LA SUITE DE LA CREATION D'UN ELEVEUR
        if (session('vetoDeleveur')) {

          // On met à jour l'éleveur dont on vient de créer le véto
          $modif = DB::table('eleveurs')->where('user_id', session('user')->id)->update(['veto_id' => $nouveau_veto->id]);

          return redirect()->route('eleveurAdmin.show', session('user')->id);

        }
        // CAS OU LA CREATION D'UN VETO EST PARTIE DE LA LISTE DES VETOS OU DES UTILISATEURS EN GÉNÉRAL

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

        $user = $this->formatUserVeto($user); // Mise en forme des numéro cro et tel des vétos

        $vetoInfos = $this->vetoInfos($user); // Ajoute les nombres de demande (et plus tard peut-être d'autres infos)

        $demandes = Demande::where('veto_id', $user->veto->id)->orderBy('date_reception', 'desc')->get();

        $fournisseur = new ListeDemandesVetoFournisseur(); // voir class ListeFournisseur

        $datas = $fournisseur->renvoieDatas($demandes, "liste des demandes d'analyse", 'demandes.svg', 'tableauDemandesVeto', 'laboAdmin.create', "Ajouter une demande");

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

        session(['route_retour' => 'vetoAdmin.show']);

        return view('admin.veto.vetoEdit', [
          'menu' => $this->menu,
          'user' => $user,
          'pays' => $this->pays,
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
        //
    }
}
