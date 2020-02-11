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
use App\Models\Espece;

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
      return "analyses";
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

      $anapacks = Anapack::all();

      $analyses = Analyse::all();


      return view('extranet.choisir', [
        'menu' => $this->menu,
        'especes' => $especes,
      ]);
    }
    // Fontion ajax pour récupérer les analyses d'une espece
    public function listeAnapack($espece_id)
    {
      $liste = Collect();

      $analyses = Analyse::where('espece_id', $espece_id)->get();

      foreach ($analyses as $analyse) {

        // dump($analyse->anaactes);

        $liste->push(10);
      }
      $liste->push($analyses);
      return $liste->all();
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
