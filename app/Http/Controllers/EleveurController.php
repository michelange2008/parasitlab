<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Productions\Demande;
use App\Fournisseurs\ListeDemandesEleveurFournisseur;
use App\Http\Traits\DemandeFactory;

use App\Http\Traits\LitJson;

class EleveurController extends Controller
{

  use LitJson, DemandeFactory;

  protected $menu;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('eleveur');

        $this->menu = $this->litJson('menuExtranet');
    }

    public function index()
    {
      $user = User::find(auth()->user()->id);

      $demandes = Demande::where('user_id', auth()->user()->id)->get();

      $fournisseur = new ListeDemandesEleveurFournisseur();

      $datas = $fournisseur->renvoieDatas($demandes, "liste des demandes d'analyse", 'demandes.svg', 'tableauDemandesEleveur', 'demandes.create', "Ajouter une demande d'analyse");

      $zeroAnalyses = "Vous n'avez pour l'instant aucune demande d'analyse";

      return view('utilisateurs.eleveurs.index', [
        "menu" => $this->menu,
        'user' => $user,
        'datas' => $datas,
        'zeroAnalyses' => $zeroAnalyses,
      ]);
    }

    public function demandeShow($demande_id)
    {
      $demande = Demande::find($demande_id);

      $demande = $this->demandeFactory($demande);

      return view('utilisateurs.eleveurs.eleveurDemandeShow', [
        'menu' => $this->menu,
        'demande' => $demande,
      ]);
    }

    public function serieShow($serie_id)
    {
      return "coucou";
    }
}
