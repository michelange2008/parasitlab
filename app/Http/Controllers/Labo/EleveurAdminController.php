<?php
namespace App\Http\Controllers\Labo;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Fournisseurs\ListeEleveursFournisseur;
use App\Fournisseurs\ListeDemandesFournisseur;
use App\Fournisseurs\ListeDemandesEleveurFournisseur;

use Carbon\Carbon;
use App\User;
use App\Models\Eleveur;
use App\Models\Veto;
use App\Models\Productions\Demande;

use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;
use App\Http\Traits\EleveurInfos;

/**
 *
 * CLASSE DE GESTION DES ELEVEURS (CRUD)
 *
 */

class EleveurAdminController extends Controller
{
    use LitJson, EleveurInfos, UserTypeOutil;

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
      session()->forget(['user_id', 'encreation']);

      $users = User::where('usertype_id', $this->userTypeEleveur()->id)->get();

      $icone = $this->userTypeEleveur()->icone->nom;

      $fournisseur = new ListeEleveursFournisseur(); // voir class ListeFournisseur

      $datas = $fournisseur->renvoieDatas($users, "liste des éleveurs", $icone, 'tableauEleveurs', 'eleveurAdmin.create', "Ajouter un éleveur");

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
      // if(session('user_id') !== null)
      // {
      //
      // // SI UN ID DE USER EST STOCKE EN SESSION C'EST QUE
      // // ON EST EN TRAIN DE CREER UN ELEVEUR
      // session()->forget('user_id');
      //
      //   return view('labo.eleveurCreate', [
      //     'menu' => $this->menu,
      //     'user' => User::find(session('user_id')),
      //     'vetos' => $this->vetos,
      //   ]);
      // }
      // else
      // {
        // DANS LE CAS CONTRAIRE IL FAUT RENVOYER VERS LA CREATION DE L USER
        // AVANT LES DETAILS PROPRES A L ELEVEUR
        session(['usertype' => $this->userTypeEleveur()]);

        return redirect()->route('user.create');
      // }
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

        $nouvel_eleveur = Eleveur::firstOrNew(['user_id' => $datas['user_id']]);

        $nouvel_eleveur->user_id = $datas['user_id']; // Passer en input type hidden
        $nouvel_eleveur->num = $datas['num'];
        $nouvel_eleveur->address_1 = $datas['address_1'];
        $nouvel_eleveur->address_2 = $datas['address_2']; // peut être null
        $nouvel_eleveur->cp = $datas['cp'];
        $nouvel_eleveur->commune = $datas['commune'];
        $nouvel_eleveur->pays = $datas['pays'];
        $nouvel_eleveur->indicatif = ($datas['indicatif'] === null) ? 33 : $datas['indicatif']; // on met l'indicatif de la France si non renseigné
        $nouvel_eleveur->tel = $datas['tel'];
        $nouvel_eleveur->veto_id = ($datas['veto_id'] == 0) ? 1 : $datas['veto_id']; // si le veto est à créer (veto_id = 0) on lui met temporairement l'id 1 (aucun vétérinaire) en atendant de créer le véto

        $nouvel_eleveur->save();

        // si le veto_id == 0, c'est qu'il faut créer un nouveau veto
        if($datas['veto_id'] == 0) {

          session(['user_id' => $nouvel_eleveur->user->id]);

          session(['usertype' => $this->userTypeVeto()]);

          return redirect()->route('user.create');

        // sinon on peut revenir à la route de retour
        } else {

          session()->forget(['usertype', 'user_id']); // après avoir vidé les infos passées en session
// TODO: route de redirection en fonction d'où on vient
          return redirect()->route('user.index');

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

        $user = $this->eleveurUser($user);

        $eleveurInfos = $this->eleveurInfos($user);

        $demandes = Demande::where('user_id', $id)->orderBy('date_reception', 'desc')->get();

        $fournisseur = new ListeDemandesEleveurFournisseur(); // voir class ListeFournisseur

        $datas = $fournisseur->renvoieDatas($demandes, "liste des demandes d'analyse", 'demandes.svg', 'tableauDemandesEleveur', 'demandes.create', "Ajouter une demande");

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

      return view('admin.eleveur.eleveurEdit', [
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
      $datas = $request->all();

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
