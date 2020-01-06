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
use App\Http\Traits\UserCreateDetail;

/**
 *
 * CLASSE DE GESTION DES ELEVEURS (CRUD)
 *
 */

class EleveurAdminController extends Controller
{
    use LitJson, EleveurInfos, UserTypeOutil, UserCreateDetail;

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
      session()->forget(['user_id', 'encreation', 'user', 'vetoDeleveur', 'usertype']);

      $users = User::where('usertype_id', $this->userTypeEleveur()->id)->get();

      $icone = $this->userTypeEleveur()->icone->nom;

      $fournisseur = new ListeEleveursFournisseur(); // voir class ListeFournisseur

      $datas = $fournisseur->renvoieDatas($users, "liste des éleveurs", $icone, 'tableauEleveurs', 'eleveurAdmin.create', "Ajouter un éleveur");

      return view('admin.index.pageIndex', [
        'menu' => $this->menu,
        'datas' => $datas,
        'userType_nom' => $this->userTypeEleveur()->nom,
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        session([
          'usertype' => $this->userTypeEleveur(),
          'route_retour' => 'eleveurAdmin.show',
        ]);

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

        // Le nouvel utilisateur créé n'est pas encore enregistré
        // (méthode pour éviter de créer un user sans les users spécifiques (labo, veto, éleveur)
        // si le formulaire n'est pas rempli juqu'au bout)
        // On le récupère par la variable de session.
        $nouvel_user = session('nouvel_user');

        session()->forget('nouvel_user', 'usertype');
        // Et on l'enregistre
        $nouvel_user->save();

        // TODO: Envoyer au nouvel utilisateur ses identifants de connexion

        //Puis on fait appel au trait UserCreateDetail pour vérifier et enregistrer le labo correspondant
        $this->eleveurCreateDetail($datas, $nouvel_user->id);

        session(['user' => $nouvel_user]);
        // si le veto_id == 0, c'est qu'il faut créer un nouveau veto
        if($datas['veto_id'] == 0) {


          session(['vetoDeleveur' => true]);

          session(['usertype' => $this->userTypeVeto()]);

          return redirect()->route('user.create')->with('status', 'Il faut créer un vétérinaire pour '.$nouvel_user->name);

        // Cas où la création de l'éleveur se fait dans le cadre d'une demande d'analyse
        } elseif (session('eleveurDemande')) {

          session(['user' => $nouvel_user]); // On rajoute le nouvel user en session pour qu'il soit choisi par défaut dans la liste déroulante

          return redirect()->route('demandes.create'); // Et on renvoie au forulaire de création d'une nouvelle demande

        // sinon on peut revenir à la route de retour
        } else {

          session()->forget(['usertype', 'user_id']); // après avoir vidé les infos passées en session

          return redirect()->route('eleveurAdmin.show', $nouvel_eleveur->user->id);

        }
// TODO: Quel intêret de la valeur en session route_retour ?
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        session()->forget('route_retour'); // si route_retour est définie, on l'oublie

        $user = User::find($id);

        $user = $this->eleveurFormatNumber($user);

        $eleveurInfos = $this->eleveurInfos($user);

        $demandes = Demande::where('user_id', $id)->orderBy('date_reception', 'desc')->get();

        $fournisseur = new ListeDemandesEleveurFournisseur(); // voir class ListeFournisseur

        $datas = $fournisseur->renvoieDatas($demandes, "liste des demandes d'analyse", 'demandes.svg', 'tableauDemandesEleveur', 'demandes.create', "Ajouter une demande");

        $zeroAnalyses = "Cet éleveur n'a pour l'instant fait aucune demande d'analyse";

        session(['user' => $user]);

        return view('admin.eleveurShow', [
          'menu' => $this->menu,
          'user' => $user,
          'eleveurInfos' => $eleveurInfos,
          'zeroAnalyses' => $zeroAnalyses,
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

      session(['route_retour' => 'eleveurAdmin.show']);

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
        // NON IMPLEMENTE CAR PRIS EN CHARGE PAR user.destroy QUI PAR CASCADE DETRUIT L'UTILISATEUR ELEVEUR
    }
}
