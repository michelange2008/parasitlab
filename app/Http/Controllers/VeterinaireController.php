<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Traits\LitJson;
use App\Http\Traits\DemandeFactory;

use App\Models\Productions\Demande;

use App\Fournisseurs\ListeDemandesVetoFournisseur;

class VeterinaireController extends Controller
{

  use LitJson, DemandeFactory;

  protected $menu;

    public function __construct()
    {
      $this->menu = $this->litJson('menuExtranet');

      $this->middleware('auth');
      $this->middleware('veto');

    }

    public function index()
    {
      $demandes = Demande::where('veto_id', auth()->user()->veto->id)->get();

      foreach ($demandes as $demande) {

        $demande = $this->demandeFactory($demande);

      }

      $fournisseur = new ListeDemandesVetoFournisseur();

      $datas = $fournisseur->renvoieDatas($demandes, "liste des demandes d'analyse", 'demandes.svg', 'tableauDemandesVeto', 'demandes.create', "Ajouter une demande d'analyse");

      return view('utilisateurs.index', [
        'menu' => $this->menu,
        'demandes' => $demandes,
        'datas' => $datas,
      ]);

    }

    public function demandeShow($demande_id)
    {
      $demande = Demande::find($demande_id);

      $demande = $this->demandeFactory($demande);

      $commentaire = Commentaire::where('demande_id', $demande_id)->first();

      return view('utilisateurs.utilisateurDemandeShow', [
        'menu' => $this->menu,
        'demande' => $demande,
        'commentaire' => $commentaire,

      ]);
    }

    public function serieShow($demande_id)
    {

    }
}
// TODO: Comment faire avec le "aucun vétérinaire"
