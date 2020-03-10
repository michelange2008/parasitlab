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
use App\Models\Productions\Reglement;

use App\Fournisseurs\ListeFacturesFournisseur;

use App\Http\Traits\LitJson;
use App\Http\Traits\DemandeFactory;
use App\Http\Traits\FactureFactory;
use App\Http\Traits\FormatDate;

class FactureController extends Controller
{

    use LitJson, DemandeFactory, FactureFactory, FormatDate  {
      FormatDate::dateSortable insteadof DemandeFactory;
      FormatDate::dateReadable insteadof DemandeFactory;
    }

    protected $menu;

    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('labo');

      $this->menu = $this->litJson('menuLabo');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $factures = Facture::all();

      foreach ($factures as $facture) {
        $somme_facture = $this->calculSommeFacture($facture);
        $facture->total_ht = $somme_facture->total_ht;
        $facture->total_ttc = $somme_facture->total_ttc;
      }

      $fournisseur = new ListeFacturesFournisseur();

      $datas = $fournisseur->renvoieDatas($factures, "Liste des factures", "factures.svg", 'tableauFactures', 'factures.etablir', 'Factures à établir');

      return view('labo.factures', [
        'menu' => $this->menu,
        'datas' => $datas,
      ]);
    }

    /**
    * Fonction pour lister les factures à établir
    */
    public function etablir()
    {
      // liste des utilisateurs qui ont des actes à facturer avec l'id de l'acte
      $users_anf =$this->clientsActesAFacturer();
      //liste des utilisateurs qui ont des demandes à facturer avec l'il de la demande
      $users_dnf = $this->clientsDemandesAFacturer();
      //liste des id des utilisateurs à facturer.

      session(['users_dnf' => $users_dnf]);

      $users_a_facturer = $users_anf->keys()->merge($users_dnf->keys())->unique();

      $users = User::find($users_a_facturer);

      return view('labo.factures.factureAEtablir', [
        'menu' => $this->menu,
        'users' => $users,
      ]);
    }

    /**
    * Fonction pour créer une facture après avoir choisi le destinataire
    */
    public function preCreate($user_id)
    {
      // Cas où on reprend une session sans passer par factures.etablir
      // Il n'y a pas de tableau users_dnf stocké.
      if (!session()->has('users_dnf')) {

        return redirect()->route('factures.etablir');

      }

      $user = User::find($user_id);

      $users_dnf = session()->get('users_dnf');

      if($users_dnf->keys()->contains($user_id))
      {
        $demandes = Demande::find($users_dnf[$user_id]); // on reprend l'id du destinataire de facture associé aux id des demandes (cf; function etablir)
        $demandes = $this->formatDateDemandes($demandes);

      }
      else {
        $demandes = null;
      }


      $actes = Acte::where('facturee', false)->where('user_id', $user_id)->get();

      return view('labo.factures.factureCreate', [
        'menu' => $this->menu,
        'user' => $user,
        'demandes' => $demandes,
        'actes' => $actes,
      ]);
    }

    /**
     * Non utilisé à cause de la spéficité de l'établissement d'une facture
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Cas où on reprend une session sans passer par factures.etablir
      // Il n'y a pas de tableau users_dnf stocké.
      if (!session()->has('users_dnf')) {

        return redirect()->route('factures.etablir');

      }
      $datas = $request->all();

      $nouvelle_facture = new Facture();
      $nouvelle_facture->user_id = $datas['destinataire'];
      $nouvelle_facture->faite_date = Carbon::now();

      $nouvelle_facture->save();

      // stockage du détail de la facture dans la table anaacte_facture
      foreach ($datas as $key => $value) { // on passe en revue les données issues du formulaire

        $element = explode('_', $key); // On explose la clef

        if($element[0] == "demande") { // si la première partie de la clef est demande

          $demande = Demande::find($element[1]); // on recherche cette demande avec la seconde partie de la clef

          foreach ($demande->anapack->anaactes as $anaacte) { // on passe en revue les anaactes de l'anapack de la demande

            $nouvelle_facture->anaactes()->attach($anaacte->id, [ // et on en saisit les donnnées dans la table pivot anaacte_facture
              'facture_id' => $nouvelle_facture->id,
              'pu_ht' => $anaacte->pu_ht,
              'tva_id' => $anaacte->tva_id,
              'date' => $demande->date_reception,
            ]);

          }

          // On marque la demande comme facturés
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

      return redirect()->route('factures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reglements = Reglement::all();

        $facture = Facture::findOrFail($id);
        // dd($facture);
        $facture->faite_date = $this->dateReadable($facture->faite_date);

        $facture_completee = $this->ajouteSommeEtTvas($facture);

        $anaactes_factures = Anaacte_Facture::where('facture_id', $id)->get();

        $demandes = Demande::where('facture_id', $id)->get();

        foreach ($demandes as $demande) {

          $demande->date_reception = $this->dateReadable($demande->date_reception);

        }
        session(['facture_completee'=> $facture_completee, 'demandes'=> $demandes, 'anaactes_factures' => $anaactes_factures]);

        return view('labo.factures.facture', [
          'menu'=> $this->menu,
          'reglements' => $reglements,
          'facture_completee' => $facture_completee,
          'demandes' => $demandes,
          'anaactes_factures' => $anaactes_factures,
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
        //
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
