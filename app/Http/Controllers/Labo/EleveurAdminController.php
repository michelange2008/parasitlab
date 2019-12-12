<?php
namespace App\Http\Controllers\Labo;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Fournisseurs\ListeEleveursFournisseur;
use App\Fournisseurs\ListeDemandesFournisseur;

use Carbon\Carbon;
use App\User;
use App\Models\Eleveur;
use App\Models\Veto;
use App\Models\Productions\Demande;

use App\Http\Traits\LitJson;
use App\Http\Traits\EleveurInfos;

/**
 *
 * CLASSE DE GESTION DES ELEVEURS (CRUD)
 *
 */

class EleveurAdminController extends Controller
{
    use LitJson, EleveurInfos;

    protected $menu;
    protected $pays;
    // protected $vetos;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->menu = $this->litJson("menuLabo");
      $this->pays = $this->litJson("pays");
      $this->vetos = Veto::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $eleveurs = Eleveur::all();

      $icone = $eleveurs[0]->user->userType->icone->nom;

      $fournisseur = new ListeEleveursFournisseur(); // voir class ListeFournisseur

      $datas = $fournisseur->renvoieDatas($eleveurs, "liste des éleveurs", $icone, 'tableauEleveurs');

      return view('admin.index', [
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
      // RECUPERE L'ID DU USER QUI VIENT D'ETRE ENREGISTREE VIA LE GET

        return view('labo.eleveurCreate', [
          'menu' => $this->menu,
          'user' => User::find($_GET['user_id']),
          'vetos' => $this->vetos,
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

        $user = $this->eleveurUser($user);

        $eleveurInfos = $this->eleveurInfos($user);

        $demandes = Demande::where('user_id', $id)->orderBy('date_reception', 'desc')->get();

        $icone = 'demandes.svg';

        $fournisseur = new ListeDemandesFournisseur(); // voir class ListeFournisseur

        $datas = $fournisseur->renvoieDatas($demandes, "liste des demandes d'analyse", $icone, 'tableauDemandes');

        return view('admin.eleveurShow', [
          'menu' => $this->menu,
          'user' => $user,
          'eleveurInfos' => $eleveurInfos,
          'datas' => $datas,
          'pays' => $this->pays,
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
      $user =User::find($id);

      $vetos = Veto::where('id', '<>', $user->eleveur->veto_id)->get();

      return view('admin.eleveurEdit', [
        'menu' => $this->menu,
        'user' => $user,
        'pays' => $this->pays,
        'vetos' => $vetos

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
