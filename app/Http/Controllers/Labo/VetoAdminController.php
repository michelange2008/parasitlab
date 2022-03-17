<?php
namespace App\Http\Controllers\Labo;
use Log;
use DB;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Mail\Mailer;
use App\Mail\EnvoiInfosConnexion;
use App\Http\Controllers\Controller;
use App\Fournisseurs\ListeVetosFournisseur;
use App\Fournisseurs\ListeDemandesVetoFournisseur;

use App\Models\Veto;
use App\Models\Productions\Demande;
use App\User;

use App\Http\Traits\LitJson;
use App\Http\Traits\VetoInfos;
use App\Http\Traits\UserTypeOutil;
use App\Http\Traits\UserCreateDetail;

/**
 * [VetoAdminController description]
 *
 * @package Utilisateurs
 * @subpackage Veto
 */
class VetoAdminController extends Controller
{

  use LitJson, VetoInfos, UserTypeOutil, UserCreateDetail;

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
        session()->forget(['creation']);
        session()->forget(['user_id', 'encreation', 'user', 'vetoDeleveur', 'usertype', 'eleveurDemande', 'route_retour']);

        $users = User::where('usertype_id', $this->userTypeVeto()->id)->get();

        $icone = $this->userTypeVeto()->icone->nom;

        $fournisseur = new ListeVetosFournisseur();

        $datas =$fournisseur->renvoiedatas($users, __('titres.list_vets'), $icone, 'tableauVetos', 'vetoAdmin.create', __('boutons.add_vet'));

        return view('admin.index.pageIndex', [
          'menu' => $this->menu,
          'datas' => $datas,
          'userType_nom' => $this->userTypeveto()->nom,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      session(['creation.usertype' => $this->userTypeVeto()]);

      return redirect()->route('user.create');

    }
    /*
    * Fonction appelée lors de la création d'un véto pendant la saisie
    *d'une demande d'analyse destinée à ajouter une variable de session
    */
    public function createOnDemande()
    {

      session(['creation.veto_d_eleveur'=> true]);

      return redirect()->route('vetoAdmin.create');
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

        // Le nouvel utilisateur créer n'est pas encore enregistré
        // (méthode pour éviter de créer un user sans les users spécifiques (labo, veto, éleveur)
        // si le formulaire n'est pas rempli juqu'au bout)

        // On le récupère par la variable de session.
        $nouvel_user = session('creation.nouvel_user');
        Log::info($nouvel_user);
        session()->forget(['creation.nouvel_user']);
        // On crée le mot de passe (maintenant et non dans UserController pour ne pas pas avoir à le stoker en session)
        $mdp = str_random(8);
        $nouvel_user->password = $mdp; // On stocke d'abord le mdp sous bcrypt pour pouvoir l'envoyer par mail
        
        //Envoyer au nouvel utilisateur ses identifants de connexion
        $mail = Mail::to($nouvel_user->email)->send(new EnvoiInfosConnexion($nouvel_user));

        // Puis on crypte le mdp avant de la stocker en base de donnée
        $nouvel_user->password = bcrypt($mdp);

        // Et on l'enregistre
        $nouvel_user->save();

        // TODO: Envoyer au nouvel utilisateur ses identifants de connexion

        //Puis on fait appel au trait UserCreateDetail pour vérifier et enregistrer le labo correspondant
        $nouveau_veto = $this->vetoCreateDetail($datas, $nouvel_user->id);

        // CAS OU LA CREATION D'UN VETO SE FAIT À LA SUITE DE LA CREATION D'UN ELEVEUR
        if (session('creation.veto_d_eleveur')) {

          // Cas où la création du véto s'est faite dans la cadre de la création d'une nouvelle demande avant le choix d'un éleveur

          if (session('creation.demande_en_cours')) {

            session(['creation.nouveau_veto.id'=> $nouveau_veto->id, 'creation.nouveau_veto.name' => $nouveau_veto->user->name]);
            return redirect()->route('demandes.create');

          } else {

            // On met à jour l'éleveur dont on vient de créer le véto
            $modif = DB::table('eleveurs')->where('user_id', session('creation.user')->id)->update(['veto_id' => $nouveau_veto->id]);

            return redirect()->route('eleveurAdmin.show', session('creation.user')->id);

          }

        // CAS OU LA CREATION D'UN VETO EST PARTIE DE LA LISTE DES VETOS OU DES UTILISATEURS EN GÉNÉRAL
        } else {

          return redirect()->route('vetoAdmin.index');

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

        $user = $this->formatNumTelVeto($user); // Mise en forme des numéro cro et tel des vétos

        $vetoInfos = $this->vetoInfos($user); // Ajoute les nombres de demande (et plus tard peut-être d'autres infos)

        $demandes = Demande::where('tovetouser_id', $user->id)->orderBy('date_reception', 'desc')->get();

        $fournisseur = new ListeDemandesVetoFournisseur(); // voir class ListeFournisseur

        $datas = $fournisseur->renvoieDatas($demandes, __('titres.list_demandes'), 'demandes.svg', 'tableauDemandesVeto', 'demandes.create', __('boutons.add_demande'));

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

        session(['creation.route_retour' => 'vetoAdmin.show']);

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
        User::destroy($id);

        return redirect()->route('vetoAdmin.index')->with('message', 'user_suppr');
    }
}
