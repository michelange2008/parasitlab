<?php

namespace App\Http\Controllers;

/**
* Controller destiné à gérer tout ce qui est public
*/
use Illuminate\Support\Facades\Auth;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Analyses\Anapack;
use App\Models\Analyses\Analyse;
use App\Models\Analyses\Anaacte;
use App\Models\Espece;
use App\Models\Eleveur;
use App\Models\Veto;

use App\Http\Traits\LitJson;

class ExtranetController extends Controller
{

    use LitJson;

    protected $menu;

    public function __construct()
    {
      $this->menu = $this->litJson('menuExtranet');
    }

    public function accueil()
    {
      return view('extranet.accueil', [
        "menu" => $this->menu,
      ]);
    }

    public function veterinaires()
    {
      $anapacks = Anapack::where('veto', true)->get();

      return view('extranet.veterinaires', [
        "menu" => $this->menu,
        "anapacks" => $anapacks,
      ]);
    }

    public function eleveurs()
    {
      return view('extranet.accueil', [
        "menu" => $this->menu,
      ]);
    }

    public function cavaliers()
    {
      return view('extranet.accueil', [
        "menu" => $this->menu,
      ]);
    }

    public function parasitisme()
    {
      return view('extranet.parasitisme.parasitisme', [
        "menu" => $this->menu,
      ]);
    }

    public function resistances()
    {
      return "resistances";
    }

    public function analyses()
    {
      return view('extranet.analyses', [
        'menu' => $this->menu,
      ]);
    }

    public function quisommesnous()
    {
      return "qui sommes-nous ?";
    }

    public function enpratique()
    {
      return "en pratique";
    }

    public function choisir()
    {
      $especes = Espece::where('type', 'simple')->get();

      $liste = Collect();

      $anapacks = Anapack::all();

      foreach ($especes as $espece) {

        $liste_anapack = Collect();

        foreach ($anapacks as $anapack) {

          foreach($anapack->especes as $anapack_espece) {

            if($espece->id == $anapack_espece->id) {

              $liste_anapack->push($anapack);
            }

          }

          $liste->put($espece->id, $liste_anapack);

          }

        }

      return view('extranet.choisir', [
        'menu' => $this->menu,
        'especes' => $especes,
        'liste' => $liste,
      ]);
    }

    public function formulaireDemande($espece_id, $anapack_id)
    {
      $espece = Espece::find($espece_id);

      $anapack = Anapack::find($anapack_id);

      $eleveurs = Eleveur::all();

      $vetos = Veto::all();

      $pays = $this->litJson("pays");


      $user = (auth()->user()) ? auth()->user() : "";

      return view('extranet.formulaireDemande', [
        'menu' => $this->menu,
        'eleveurs' => $eleveurs,
        'espece' => $espece,
        'anapack' => $anapack,
        'user' => $user,
        'vetos' => $vetos,
        'pays' => $pays,
      ]);
    }

    public function formulaireStore(Request $request)
    {
      dd($request->all());
    }

    public function aide()
    {
      return "aide";
    }

    public function contact()
    {
      return view('extranet.contact', [
        "menu" => $this->menu,
      ]);
    }
}
