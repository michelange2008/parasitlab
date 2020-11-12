<?php

namespace App\Http\Controllers\Labo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Fournisseurs\ListeDemandesFournisseur;

use App\Http\Traits\LitJson;
use App\Http\Traits\EleveurInfos;
use App\Http\Traits\DemandeFactory;
use App\Http\Traits\FactureFactory;
use App\Http\Traits\UserTypeOutil;
use App\Http\Traits\SerieManager;

use App\User;
use App\Models\Eleveur;
use App\Models\Espece;
use App\Models\Analyses\Anatype;
use App\Models\Analyses\Anaacte;
use App\Models\Analyses\Analyse;
use App\Models\Analyses\Anaitem;
use App\Models\Veto;
use App\Models\Usertype;
use App\Models\Productions\Demande;
use App\Models\Productions\Facture;
use App\Models\Productions\Serie;
use App\Models\Productions\Prelevement;
use App\Models\Productions\Etat;
use App\Models\Productions\Resultat;
use App\Models\Productions\Commentaire;
use App\Models\Productions\Signe;

class DemandeController extends Controller
{
    use LitJson, EleveurInfos, DemandeFactory, FactureFactory, SerieManager;
    use UserTypeOutil ;

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

      $datas = $fournisseur->renvoieDatas($demandes, __('titres.list_demandes'), 'demandes.svg', 'tableauDemandes', 'demandes.create', __('boutons.add_demande'));

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
        session([
          'eleveurDemande' => true,
          'usertype' => $this->userTypeEleveur(),
        ]);

        $vetos = DB::table('vetos')->join('users', 'users.id', "=", 'vetos.user_id')->orderBy('users.name', 'asc')->get();

        $eleveurs = DB::table('eleveurs')->join('users', 'users.id', '=', 'eleveurs.user_id')->orderBy('users.name', 'asc')->get();

        $estParasite = $this->litJson('estParasite');
// TODO: Ne pas oublier de vider les valeurs de session
        return view('labo.demandeCreate', [
          'menu' => $this->menu,
          'eleveurs' => $eleveurs,
          'especes' => Espece::all(),
          'anatypes' => Anatype::all(),
          'vetos' => $vetos,
          'usertypes' => Usertype::all(),
          'etats' => Etat::all(),
          'signes' => Signe::all(),
          'estParasite' => $estParasite,
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
// dd($datas);
      session()->forget('eleveurDemande', 'usertype'); // On supprime le cookie permettait de revenir à demande.create en cas de création d'une nouvel éleveur
      // On recherche les _id des différentes variables de la demande
      $user = User::find($datas['userDemande']);
      $espece = Espece::where('nom', $datas['espece'])->first();
      $anaacte = Anaacte::find($datas['anaacte_id']);
      // GESTION DE LA SERIE
      if ($datas['serie'] == "null" || $datas['serie'] == 0) { // Si l'anaacte ne correspond pas à une série

        $serie_id = null; // $serie_id est null

      } elseif ($datas['serie'] === 'premier') { // Si c'est le premier prélèvement d'une série

        $serie_id = $this->serieStore($user->id, $espece->id, $anaacte->id)->id; // On crée la série et on retourne l'id

      } else {

        $serie_id = intVal($datas['serie']); // Si c'est une demande pour la suite d'une série existante, on prend l'id de la série

      }
      // Prise en compte du troupeau: soit il a une id soit c'est un nouveau troupeau
      $troupeau_id =($datas['troupeau'] === 'nouveau') ? null : $datas['troupeau'];

      // Si la case à cocher "envoi au véto" es cochée, on recherche l'id du véto choisi
      if(isset($datas['toveto']))
      {
        $toveto = true;
        $user_veto_id = $datas['veto_id'];
        $user_veto = User::find($user_veto_id);
        $veto_id = $user_veto->veto->id;
      }
      // Sinon le "veto_id" est passé à null
      else {
        $toveto = false;
        $user_veto_id = null;
        $veto_id = null;
      }

      // Puis créer la demande
      $nouvelle_demande = new Demande();
      $nouvelle_demande->user_id = $user->id;
      $nouvelle_demande->nb_prelevement = $datas['nbPrelevements'];
      $nouvelle_demande->espece_id = $espece->id;
      $nouvelle_demande->troupeau_id = $troupeau_id;
      $nouvelle_demande->anaacte_id = $anaacte->id;
      $nouvelle_demande->serie_id = $serie_id;
      $nouvelle_demande->informations = $datas['informations'];
      $nouvelle_demande->toveto = $toveto;
      $nouvelle_demande->veto_id = $veto_id;
      $nouvelle_demande->date_prelevement = $datas['prelevement'];
      $nouvelle_demande->date_reception = $datas['reception'];

      $nouvelle_demande->save();

      return redirect()->route('prelevement.createOnDemande', $nouvelle_demande->id);
      // CREATION DES PRELEVEMENTS
        // on cherche d'abord toutes les analyses correspondant aux actes (anatype->anaactes)
        // certains anaactes correspondent à plusieurs analyses: ex: copro + identification haemonchus

        $analyse = Analyse::where('analyses.anatype_id', $anaacte->anatype->id)
                  ->where('analyses.espece_id', $espece->id)
                  ->first();
        // Puis pour chaque analyse
        // Il faut créer les prélèvements

        if ($analyse !== null) {


          for ($i=1; $i <= $datas['nbPrelevements'] ; $i++) {
            $etat = Etat::where('nom', $datas['etatPrelevement_'.$i])->first();

            $nouveau_prelevement = new Prelevement;

            $nouveau_prelevement->demande_id = $nouvelle_demande->id;
            $nouveau_prelevement->analyse_id = $analyse->id;
            $nouveau_prelevement->identification = $datas['identification_'.$i];
            $nouveau_prelevement->etat_id = $etat->id;
            $nouveau_prelevement->parasite = (isset($datas['parasite_'.$i])) ? $datas['parasite_'.$i] : null;

            $nouveau_prelevement->save();
            // Après sauvegarde du prélèvement on peut remplir la table pivot avec les signes (diarrhée, etc.)
            foreach (Signe::all() as $signe) {
              if(isset($datas['signe_'.$i.'_'.$signe->id])){
                $nouveau_prelevement->signes()->attach($signe->id);

              }
            }
          }
        }

      return redirect()->route('demandes.index');
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

      $user = $this->eleveurFormatNumber($user); // Formate les nombres de l'utilisateur: ede, téléphone, etc.

      $demande = $this->demandeFactory($demande); // Trait DemandeFactory : ajoute attributs toutNegatif et nonDetecte aux prélèvements et met les dates à un format lisible

      if($demande->facturee) {

        $facture = Facture::find($demande->facture_id);

        $facture = $this->ajouteSommeEtTvasEtNum($facture);

      } else {

        $facture = null;

      }

      return view('labo.demandeShow', [
        'menu' => $this->menu,
        'demande' => $demande,
        'facture' => $facture,
        'user' => $user,
        'eleveurInfos' => $this->eleveurInfos($user),
      ]);

    }

    /**
     * Saisie des résulats d'une analyse
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($demande_id)
    {
      $demande = Demande::find($demande_id);

      $prelevements = Prelevement::where('demande_id', $demande_id)->get();

      return view('labo.resultats.resultatsSaisie', [
        'menu' => $this->menu,
        'prelevements' => $prelevements,
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

      dd($request->all());

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

    public function signer($demande_id)
    {

      $demande = Demande::find($demande_id);

      DB::table('demandes')->where('id', $demande_id)->update([
        'signe' => true,
        'date_signature' => \Carbon\Carbon::now(),
        'labo_id' => auth()->user()->id,
      ]);


    }

}
