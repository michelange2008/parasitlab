<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Traits\LitJson;
use App\Http\Traits\DemandeFactory;

use App\Models\Productions\Demande;

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
      $demande = Demande::where('veto_id', auth()->user())

      return view('Utilisateurs.vetos.indexVeto', [
        'menu' => $this->menu,
        'demande' => $demande,
      ]);

    }
}
// TODO: Comment faire avec le "aucun vétérinaire"
