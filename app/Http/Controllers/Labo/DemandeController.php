<?php

namespace App\Http\Controllers\Labo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Fournisseurs\ListeDemandesFournisseur;

use App\Http\Traits\LitJson;
use App\Http\Traits\EleveurInfos;
use App\Http\Traits\DemandeInfos;
use App\Http\Traits\UserTypeOutil;
use App\Http\Traits\DestinataireFacture;

use App\User;
use App\Models\Eleveur;
use App\Models\Espece;
use App\Models\Analyses\Anapack;
use App\Models\Veto;
use App\Models\Usertype;
use App\Models\Productions\Demande;
use App\Models\Productions\Etat;
use App\Models\Productions\Consistance;

class DemandeController extends Controller
{
    use LitJson, EleveurInfos, DemandeInfos, UserTypeOutil, DestinataireFacture;

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

    public function index()
    {
      $demandes = Demande::all();

      session()->forget('user');

      $fournisseur = new ListeDemandesFournisseur();

      $datas = $fournisseur->renvoieDatas($demandes, "liste des demandes d'analyse", 'demandes.svg', 'tableauDemandes', 'demandes.create', "Ajouter une demande d'analyse");

      return view('admin.index.pageIndex', [
          "menu" => $this->menu,
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
        $eleveurs = Eleveur::all();
        $especesSimple = Espece::where('type', 'simple')->get();
        $anapacks = Anapack::all();
        $user_vetos = Veto::all();
        $usertypes = Usertype::all();
        $etats = Etat::all();
        $consistances = Consistance::all();

        session([
          'eleveurDemande' => true,
          'usertype' => $this->userTypeEleveur(),
        ]);
// TODO: Ne pas oublier de vider les valeurs de session
        return view('labo.demandeCreate', [
          'menu' => $this->menu,
          'eleveurs' => $eleveurs,
          'especes' => $especesSimple,
          'anapacks' => $anapacks,
          'vetos' => $user_vetos,
          'usertypes' => $usertypes,
          'etats' => $etats,
          'consistances' => $consistances,
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
      dd($datas);
      // On recherche les _id des différentes variables de la demande
      $user = User::where('name', $datas['userDemande'])->first();
      $espece = Espece::select('id')->where('nom', $datas['espece'])->first();
      $anapack = Anapack::select('id')->where('nom', $datas['anapack'])->first();

      // TODO: Il faut traiter la gestion des séries
      // TODO: Il faut créer les prélèvements
      // TODO: Il faut créer la facture
       $this->destinataireFacture($user, $datas)->id;
      // TODO: Il faut créer les résultats

      // Si la case à cocher "envoi au véto" es cochée, on recherche l'id du véto choisi
      if(isset($datas['toveto']))
      {
        $toveto = true;
        $user_veto_id = $datas['veto_id'];
      }
      // Sinon le "veto_id" est passé à null
      else {
        $toveto = false;
        $user_veto_id = null;
      }

      $nouvelle_demande = new Demande();
      $nouvelle_demande->user_id = $user->id;
      $nouvelle_demande->nb_prelevement = $datas['nbPrelevements'];
      $nouvelle_demande->espece_id = $espece->id;
      $nouvelle_demande->anapack_id = $anapack->id;
      $nouvelle_demande->serie_id = "";
      $nouvelle_demande->information = $datas['informations'];
      $nouvelle_demande->toveto = $toveto;
      $nouvelle_demande->veto_id = $user_veto_id;
      $nouvelle_demande->date_prelevement = $datas['prelevement'];
      $nouvelle_demande->date_reception = $datas['reception'];
      $nouvelle_demande->facture_id = null;

      // $nouvelle_demande->save();
      dd('fin');
      return redirect('laboratoire')->with('status', "La nouvelle demande d'analyse est enregistrée");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $demande = Demande::find($id);

      $user = $demande->user;

      $user = $this->eleveurFormatNumber($user);

      $demandeInfos = $this->demandeInfos($demande);

      $this->formatDateDemande($demande);

      return view('labo.show', [
        'menu' => $this->menu,
        'demande' => $demande,
        'demandeInfos' => $demandeInfos,
        'user' => $user,
        'eleveurInfos' => $this->eleveurInfos($user),
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      Demande::where('id', $id)->delete();

        return redirect()->route('demandes.index')->with('status', "La demande d'analyse a été supprimée");

    }
}
