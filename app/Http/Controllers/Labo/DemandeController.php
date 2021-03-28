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
use App\Models\Veto;
use App\Models\Espece;
use App\Models\Analyses\Anatype;
use App\Models\Analyses\Anaacte;
use App\Models\Analyses\Analyse;
use App\Models\Analyses\Anaitem;
use App\Models\Usertype;
use App\Models\Productions\Demande;
use App\Models\Productions\Facture;
use App\Models\Productions\Serie;
use App\Models\Productions\Prelevement;
use App\Models\Productions\Etat;
use App\Models\Productions\Resultat;
use App\Models\Productions\Commentaire;
use App\Models\Productions\Signe;

/**
 * Contrôleur central de gestion des demandes d'analyse (le coeur du métier !)
 *
 * A la base c'est un contrôleur CRUD mais la classe Demande a des particularités:
 *
 * + Quand on crée une nouvelle demande, cela entraîne en cascade la création d'autres
 * nouveaux objets: Prelevement surtout, mais aussi éventuellement Animal, Troupeau
 * + La modification d'une demande par la méthode _edit_ vise à saisir les résultats
 * de la demande d'analyse (Classe Resultat)
 *
 * Il y a en plus une méthode spécifique _signer_ visant à signer les résultats de cette
 * demande d'analyse.
 *
 * @package Productions
 */
class DemandeController extends Controller
{
    use LitJson, EleveurInfos, DemandeFactory, UserTypeOutil, FactureFactory, SerieManager;

    protected $menu;

    public function __construct()
    {
      $this->menu = $this->litJson("menuLabo");
    }

    /**
    * Affiche l'ensemble des démandes d'analyse
    *
    * Comme pour les autres cas, recours à une classe hérité de ListeFournisseur: ListeDemandesFournisseur
    *
    * @return \Illuminate\View\View admin/index/pageIndex
    */
    public function index()
    {

      $demandes = Demande::all();

      session()->forget(['creation']);

      $fournisseur = new ListeDemandesFournisseur();

      $datas = $fournisseur->renvoieDatas($demandes, __('titres.list_demandes'), 'demandes.svg', 'tableauDemandes', 'demandes.create', __('boutons.add_demande'));

      return view('admin.index.pageIndex', [
      "menu" => $this->menu,
      'datas' => $datas,
      ]);
    }

    /**
    * Affiche une vue avec un formulaire de création d'une nouvelle demande d'analyse
    *
    * Formulaire complexe avec possibilité via js de créer un nouveau Veto, un nouvel Eleveur,
    * un nouveau Prelevement.
    * @see \resources\js\demandeCreate.js
    *
    * @return \Illuminate\View\View labo/demandeCreate
    */
    public function create()
    {
      session([
      'creation.demande_en_cours' => true, // Permet de revenir au formulaire de création d'analyse dans le cas d'une création d'éleveur ou de vétérinaire
      'creation.veto_d_eleveur' => false,
      'creation.usertype' => $this->userTypeEleveur(), // En cas de création d'un user, permet de savoir que c'est un éleveur
      ]);

      // $vetos = DB::table('vetos')->join('users', 'users.id', "=", 'vetos.user_id')->orderBy('users.name', 'asc')->get();
      $vetos = Veto::all();

      $eleveurs = DB::table('eleveurs')->join('users', 'users.id', '=', 'eleveurs.user_id')->orderBy('users.name', 'asc')->get();

      $estParasite = $this->litJson('estParasite');

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
      'type_dest_fact' => $this->userTypeEleveur()->route,
      ]);
    }

    /**
    * Enregistre la nouvelle demande d'analyse
    *
    * Une fois la demande enregistrer, il faut enregistrer le ou les prélèvements
    * d'où le return redirect prelevement.createOnDemande
    *
    * @param  \Illuminate\Http\Request  $request
    * @return redirect prelevement.createOnDemande
    */
    public function store(Request $request)
    {
      $datas = $request->all();

      session()->forget('creation'); // On supprime le cookie permettait de revenir à demande.create en cas de création d'une nouvel éleveur
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

    // Puis créer la demande
    $nouvelle_demande = new Demande();
    $nouvelle_demande->user_id = $user->id;
    $nouvelle_demande->nb_prelevement = $datas['nbPrelevements'];
    $nouvelle_demande->espece_id = $espece->id;
    $nouvelle_demande->troupeau_id = $troupeau_id;
    $nouvelle_demande->anaacte_id = $anaacte->id;
    $nouvelle_demande->serie_id = $serie_id;
    $nouvelle_demande->informations = $datas['informations'];
    $nouvelle_demande->tovetouser_id = ($datas['tovetouser_id'] == 0) ? null : $datas['tovetouser_id'];
    $nouvelle_demande->date_prelevement = $datas['prelevement'];
    $nouvelle_demande->date_reception = $datas['reception'];
    $nouvelle_demande->userfact_id = ($datas['destinataireFacture'] == null) ? 1 : $datas['destinataireFacture'];

    $nouvelle_demande->save();

    return redirect()->route('prelevement.createOnDemande', $nouvelle_demande->id);

    }

    /**
    * Affiche la demande d'analyse
    *
    * Les particularités sont les suivantes:
    * + utilisation du trait eleveurFormatNumber pour la mise en forme des numéros
    * + utilisation du trait demandeFactory qui rajoute des attributs _toutNegatif_ et
    * _nonDetecté aux prélèvements.
    * + Recherche d'une facture correspondante et mise en forme si elle existe
    *
    * @param  int  $id
    * @return \Illuminate\View\View lab/demandeShow
    */
    public function show($id)
    {
      session()->forget(['creation']);

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
    * @return \Illuminate\View\View labo.resultats/resultatsSaisie
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
     * Modification des caractéristiques d'une demande (et non pas des résultats)
     * @param  int demande_id Id de la demande
     * @return  \Illuminate\View\View labo/demandeModif
     */
    public function modif($demande_id)
    {
      session([
      'creation.demande_modif' => true, // permet d'afficher des informations propres au demandeur
      'creation.demande_en_cours' => true, // Permet de revenir au formulaire de création d'analyse dans le cas d'une création d'éleveur ou de vétérinaire
      'creation.veto_d_eleveur' => false,
      ]);
      $demande = Demande::find($demande_id);

      $type_dest_fact = $demande->userfact->usertype->route;

      $vetos = Veto::all();

      return view('labo.demandeModif', [
      'menu' => $this->menu,
      'demande' => $demande,
      'type_dest_fact' => $type_dest_fact,
      'usertypes' => Usertype::all(),
      'vetos' => $vetos,

      ]);
    }

    /**
    * Enregistre la modification des caractéristiques d'une demande d'analyse (retour de la fontion modif)
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id Id de la demande
    * @return redirect demandes.show
    */
    public function update(Request $request, $id)
    {

      $datas = $request->all();

      $demande = Demande::find($id);
      $demande->date_prelevement = $datas['prelevement'];
      $demande->date_reception = $datas['reception'];
      $demande->tovetouser_id = ($datas['tovetouser_id'] == 0) ? null : $datas['tovetouser_id'];
      $demande->userfact_id = $datas['destinataireFacture'];
      $demande->informations = $datas['informations'];

      $demande->save();

      return redirect()->route('demandes.show', $id)->with('message', 'demande_updated');
    }

    /**
    * Supprime une demande d'analyse
    *
    * @param  int  $id Id de la demande à supprimer
    * @return redirect demandes.index
    */
    public function destroy($id)
    {

      Demande::where('id', $id)->delete();

      return redirect()->route('demandes.index')->with('status', "La demande d'analyse a été supprimée");

    }

    /**
     * Signature d'une demande d'analyse
     *
     * Quand les résultats ont été saisi, il est indispensable que la demande soit signée
     * avant d'être envoyer au destinaire.
     * Cette signature ne peut être faire que par User Labo et à comme effet de:
     * + passer la valeur signe à true
     * + ajouter la date de signature
     * + indiquer l'Id du signataire
     *
     * TODO: il avait été défini des User Labo signataires ou non signataire, cette
     * propriété n'est pas reprise ici --> à supprimer ?
     *
     * @param  int $id Id de la demande
     * @return redirect back ou App::abort(404, 'message') si signataire non autorisé
     */
    public function signer($demande_id)
    {

      $demande = Demande::find($demande_id);

      try {

        $labo_id = auth()->user()->labo->id;

        DB::table('demandes')->where('id', $demande_id)->update([
          'signe' => true,
          'date_signature' => \Carbon\Carbon::now(),
          'labo_id' => $labo_id,
        ]);

      } catch (\Exception $e) {

        abort(404, 'Vous n\'êtes pas autorisés à signer cette analyse');

      }


      return redirect()->back();

    }

}
