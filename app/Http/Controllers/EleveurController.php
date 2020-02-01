<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Productions\Demande;
use App\Models\Productions\Serie;
use App\Models\Productions\Commentaire;
use App\Fournisseurs\ListeDemandesEleveurFournisseur;
use App\Http\Traits\DemandeFactory;
use App\Http\Traits\SerieInfos;

use App\Http\Traits\LitJson;

class EleveurController extends Controller
{

  use LitJson, DemandeFactory, SerieInfos;

  protected $menu;

    public function __construct()
    {
        $this->menu = $this->litJson('menuExtranet');
    }

    public function index()
    {
      $user = User::find(auth()->user()->id);

      $demandes = Demande::where('user_id', auth()->user()->id)->get();

      $fournisseur = new ListeDemandesEleveurFournisseur();

      $datas = $fournisseur->renvoieDatas($demandes, "liste des demandes d'analyse", 'demandes.svg', 'tableauDemandesEleveur', 'demandes.create', "Ajouter une demande d'analyse");

      $zeroAnalyses = "Vous n'avez pour l'instant aucune demande d'analyse";

      return view('utilisateurs.index', [
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

      $commentaire = Commentaire::where('demande_id', $demande_id)->first();

      return view('utilisateurs.utilisateurDemandeShow', [
        'menu' => $this->menu,
        'demande' => $demande,
        'commentaire' => $commentaire,
      ]);
    }

    public function serieShow($serie_id)
    {
      $serie = Serie::find($serie_id);

      foreach ($serie->demandes as $demande) {

        $demande = $this->demandeFactory($demande); // Trait DemandeFactory : ajoute attributs toutNegatif et nonDetecte aux prélèvements et met les dates à un format lisible

      }

      $serieInfos = $this->serieInfos($serie);

      return view('utilisateurs.utilisateurSerieShow', [
        'menu' => $this->menu,
        'serie' => $serie,
        'serieInfos' => $serieInfos,
      ]);
    }
}
