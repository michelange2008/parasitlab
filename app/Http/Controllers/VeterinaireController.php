<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Traits\LitJson;
use App\Http\Traits\DemandeFactory;
use App\Http\Traits\SerieInfos;
use App\Http\Traits\VetoInfos;

use App\Models\Productions\Demande;
use App\Models\Productions\Serie;
use App\User;

use App\Fournisseurs\ListeDemandesVetoFournisseur;


class VeterinaireController extends Controller
{

  use LitJson, VetoInfos, SerieInfos, DemandeFactory {
      DemandeFactory::dateSortable insteadof SerieInfos;
      DemandeFactory::dateReadable insteadof SerieInfos;
  }

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

      $datas = $fournisseur->renvoieDatas($demandes, __('titres.list_demandes'), 'demandes.svg', 'tableauDemandesVeto', 'demandes.create', __('boutons.add_demande'));

      return view('utilisateurs.index', [
        'menu' => $this->menu,
        'demandes' => $demandes,
        'datas' => $datas,
      ]);

    }

    public function show($id)
    {
      $user = User::find($id);

      $vetoInfos = $this->vetoInfos($user); // Ajoute les nombres de demande (et plus tard peut-être d'autres infos)

      return view('utilisateurs.vetos.veterinaireShow', [
        'menu' => $this->menu,
        'user' => $user,
        'vetoInfos' => $vetoInfos,
        'personne' => $user->veto,
      ]);
    }

    public function demandeShow($demande_id)
    {
      $demande = Demande::find($demande_id);

      $demande = $this->demandeFactory($demande);

      return view('utilisateurs.utilisateurDemandeShow', [
        'menu' => $this->menu,
        'demande' => $demande,
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
// TODO: Comment faire avec le "aucun vétérinaire"
