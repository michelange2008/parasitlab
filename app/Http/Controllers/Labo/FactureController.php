<?php

namespace App\Http\Controllers\Labo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

use App\User;
use App\Models\Veto;
use App\Models\Productions\Facture;
use App\Models\Productions\Demande;
use App\Models\Productions\Acte;
use App\Models\Productions\Anaacte_Facture;
use App\Models\Productions\Modereglement;

use App\Fournisseurs\ListeFacturesFournisseur;

use App\Http\Traits\LitJson;
use App\Http\Traits\DemandeFactory;
use App\Http\Traits\FactureFactory;

/**
 * Contröleur pour la classe Facture
 *
 * C'est un contrôleur CRUD modifié. La particularité est qu'une facture dépend
 * d'abord d'un ou plusieurs actes, et donc dans la majorité des cas d'une demande
 * d'analyse.
 *
 * Cela explique que les méthodes _create_, _edit_ et _update_ ne soient pas
 * implémentées.
 * La méthode _create_ est remplacée par deux méthodes: _createFromUser_ et
 * _createDemandeFromUser_ qui s'appliquent dans des contexte différents.
 * Une méthode _etablir_ utilise le trait __FactureFactory__ pour établir une facture.
 * Enfin, une méthode _paiement_ est là pour envregistrer le statut d'une facture
 * vis à vis du paiement.
 *
 * @package Productions
 */
class FactureController extends Controller
{

    use LitJson, DemandeFactory, FactureFactory;

    protected $menu;

    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('labo');

      $this->menu = $this->litJson('menuLabo');

    }

    /**
     * Affiche la liste des factures
     *
     * Utilisation d'une classe héritée de ListeFournisseur (ListeFacturesFournisseur).
     * Et recalcule du montant de la facture à chaque fois. Le prix unitaire des
     * actes est stocké avec le Modèle Acte.
     *
     * @return \Illuminate\View\View labo/factures
     */
    public function index()
    {
      $factures = Facture::all();
      // On procède au calcul de chaque facture
      foreach ($factures as $facture) {
        $somme_facture = $this->calculSommeFacture($facture);
        $facture->total_ht = $somme_facture->total_ht;
        $facture->total_ttc = $somme_facture->total_ttc;
      }

      $fournisseur = new ListeFacturesFournisseur();
      // methode de ListeFournisseur (classe abstraite) : données du tableau, titre du tableau, icone du titre, nom du json avec les entetes de colonne, route du bouton, intitulé du bouton
      $datas = $fournisseur->renvoieDatas($factures, __('titres.list_factures'), "factures.svg", 'tableauFactures', 'factures.etablir', __('boutons.facture_add'));
      // Texte pour le cas où le tableau est vide
      $tableau_vide = 'factures.zero_facture';

      return view('labo.factures', [
        'menu' => $this->menu,
        'datas' => $datas,
        'tableau_vide' => $tableau_vide,
      ]);
    }

    /**
    * Fonction pour lister les factures à établir
    *
    * Utilisation du trait __FactureFactory__ avec des méthodes établissant des
    * listes d'éleveurs à facturer.
    *
    * @return \Illuminate\View\View labo/factures/factureAEtablir;
    */
    public function etablir()
    {
      // liste des utilisateurs qui ont des actes à facturer avec l'id de l'acte
      $users_anf =$this->clientsActesAFacturer();
      //liste des utilisateurs qui ont des demandes à facturer avec l'id de la demande
      $users_dnf = $this->clientsDemandesAFacturer();
      //liste des id des utilisateurs à facturer.

      session(['users_dnf' => $users_dnf]);
      // On établit une liste qui fusionne (merge) les id des users_anf et les id des users_dnf puis on ôte les doublons (unique)
      $users_a_facturer = $users_anf->keys()->merge($users_dnf->keys())->unique();
      // Et on recherche les utilisateurs de cette liste
      $users = User::find($users_a_facturer);
      // Pour pouvoir les choisirs
      return view('labo.factures.factureAEtablir', [
        'menu' => $this->menu,
        'users' => $users,
      ]);
    }

    /**
    * Fonction pour créer une facture après avoir choisi le destinataire
    *
    * @param int $user_id Id de l'User
    * @return \Illuminate\View\View labo/factures/factureCreate
    */
    public function createFromUser($user_id)
    {

      // On récupère l'user
      $user = User::find($user_id);
      // On récupère les demandes non facturées de cet user
      $demandes = Demande::where('userfact_id', $user_id)->where('facturee', false)->where('signe', true)->get();

      // Il s'agit d'anaactes qui ne correspondent pas à une analyse: pack envoi, déplacement, visite, etc.
      $actes = Acte::where('facturee', false)->where('user_id', $user_id)->get();

      return view('labo.factures.factureCreate', [
        'menu' => $this->menu,
        'user' => $user,
        'demandes' => $demandes,
        'actes' => $actes,
      ]);
    }

    /**
    * Fonction pour créer une facture après avoir choisi le destinataire et la demande
    *
    * @param int $user_id Id de l'User
    * @param int $demande_id Id de la demande
    * @return \Illuminate\View\View labo/factures/factureCreateDemandeFromUser
    */
    public function createDemandeFromUser($user_id, $demande_id)
    {

      return view('labo.factures.factureCreateDemandeFromUser', [
        'menu' => $this->menu,
        'user' => User::find($user_id),
        'demande' => Demande::find($demande_id),
      ]);

    }
    /**
     * Non utilisé à cause de la spéficité de l'établissement d'une facture: la création d'une facture dépend toujours d'un utilisateur
     * Il s'agit donc de la fonction etablir ou createFromUser
     */
    public function create()
    {

    }

    /**
     * Fonction appelée par la vue factureAEtablir issue de FactureController@etablir
     *
     * @param  \Illuminate\Http\Request  $request
     * @return redirect FactureController@show
     */
    public function store(Request $request)
    {

      $datas = $request->all();

      // Dans le cas où on passe par un user et une demande seulement, la case "rajouter un kit" a peut-être été cochée
      if(isset($datas['kit'])) {
        // Dans ce cas on rajoute un acte kit à ce user
        $kit = new Acte;

        $kit->user_id = $datas['destinataire'];
        $kit->anaacte_id = 14;

        $kit->save();

        $datas['acte_'.$kit->id] = "on";

      }

      $nouvelle_facture = new Facture();
      $nouvelle_facture->user_id = $datas['destinataire'];
      $nouvelle_facture->faite_date = Carbon::now();

      $nouvelle_facture->save();

      // stockage du détail de la facture dans la table anaacte_facture
      foreach ($datas as $key => $value) { // on passe en revue les données issues du formulaire

        $element = explode('_', $key); // On explose la clef

        if($element[0] == "demande") { // si la première partie de la clef est demande

          $demande = Demande::find($element[1]); // on recherche cette demande avec la seconde partie de la clef

          // Prévoir le cas d'un anaacte qui demande de multiplier le coût unitaire par la nombre de prelevement
          if($demande->anaacte->propPrelev) {

            $nb_ana_a_facturer = $demande->prelevements->count();

          } else {

            $nb_ana_a_facturer = 1;
          }

            $nouvelle_facture->anaactes()->attach($demande->anaacte_id, [ // et on en saisit les donnnées dans la table pivot anaacte_facture
              'facture_id' => $nouvelle_facture->id,
              'nombre' => $nb_ana_a_facturer,
              'pu_ht' => $demande->anaacte->pu_ht,
              'tva_id' => $demande->anaacte->tva_id,
              'date' => $demande->date_reception,
            ]);

          // On marque la demande comme facturés (utilisation de DB car la façade Laravel update ne marche pas)
          DB::table('demandes')->where('id', $demande->id)
                ->update([
                  'facturee' => true,
                  'facture_id' => $nouvelle_facture->id,
                ]);
        }
        // Et on refait la même chose avec les actes mais c'est plus simple car un acte n'a qu'un anaacte
        elseif ($element[0] == "acte") {

          $acte = Acte::find($element[1]);

          $nouvelle_facture->anaactes()->attach($acte->anaacte->id, [
            'facture_id' => $nouvelle_facture->id,
            'nombre' => $acte->nombre,
            'pu_ht' => $acte->anaacte->pu_ht,
            'tva_id' => $acte->anaacte->tva_id,
            'date' => $acte->updated_at->toDateTimeString(),
          ]);

          // On marque la demande comme facturés
          DB::table('actes')->where('id', $acte->id)
                ->update([
                  'facturee' => true,
                  'facture_id' => $nouvelle_facture->id,
                ]);
        }


      }

      session()->forget('users_dnf');

      return redirect()->route('factures.show', ['facture' => $nouvelle_facture->id]);
    }

    /**
     * Affiche une facture
     *
     * Utilisation de la méthode _prepareFacture_ du trait FactureFactory
     *
     * @param  int  $id Id de la facture
     * @return \Illuminate\View\View labo/factures/facture
     */
    public function show($id)
    {
        // ça c'est pour la liste déroulante du paiement de la facture
        $modereglements = Modereglement::all();
        // utilisation de la fonction elementDeFacture du trait FactureFactory
        $elementDeFacture = $this->prepareFacture($id);

        return view('labo.factures.facture', [
          'menu'=> $this->menu,
          'modereglements' => $modereglements,
          'elementDeFacture' => $elementDeFacture,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // On remet non facturé les demandes et les actes de cette facture
      DB::table('demandes')->where('facture_id', $id)->update(['facturee' => false]);
      DB::table('actes')->where('facture_id', $id)->update(['facturee' => false]);
      // Puis on dettuit la facture
      Facture::destroy($id);

      return redirect()->back()->with('message', 'facture_delete');
    }

    public function paiement(Request $request)
    {
      $datas = $request->all();

      // dd($datas);
      $facture = Facture::find($datas['facture_id']);

      $facture->payee = true;
      $facture->reglement_id = $datas['reglement_id'];
      $facture->payee_date = $datas['payee_date'];

      $facture->save();

      return redirect()->route('factures.show', $datas['facture_id']);
    }
}
