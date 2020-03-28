<?php

namespace App\Http\Controllers;

/**
* Controller destiné à gérer tout ce qui est public
*/
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Analyses\Anatype;

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
        'menu' => $this->menu,
        'accueilEntetes' => $this->litJson('accueilEntetes'),
        'accueilPastilles' => $this->litJson('accueilPastilles'),
      ]);
    }

    public function veterinaires()
    {
      $anatypes = Anatype::all();

      return view('extranet.veterinaires', [
        "menu" => $this->menu,
        "contenu" => $this->litJson('veterinaires'),
        "anatypes" => $anatypes,
      ]);
    }

    public function eleveurs()
    {
      $elements = $this->LitJson('eleveurs');

      return view('extranet.eleveurs', [
        "menu" => $this->menu,
        'elements' => $elements,
      ]);
    }

    public function cavaliers()
    {
      return view('extranet.cavaliers', [
        "menu" => $this->menu,
      ]);
    }

    public function tarifs()
    {
      // $anaactes = Anaacte::where
    }

    public function formulairePdf()
    {
      // Vous voulez afficher un pdf
      header('Content-type: application/pdf');

      // Il sera nommé demande_analyse_parasito.pdf
      header('Content-Disposition: attachment; filename="demande_analyse_parasito.pdf"');

      // Le source du PDF original.pdf
      readfile('storage/pdf/formulaire_vierge.pdf');
      // return view('extranet.analyses.enpratique.formulairePdf');
    }


    public function analyses()
    {
      return view('extranet.analyses', [
        'menu' => $this->menu,
      ]);
    }

    public function contact()
    {
      return view('extranet.contact', [
        "menu" => $this->menu,
      ]);
    }

    public function quisommesnous()
    {
      $quisommesnous = $this->litJson('quisommesnous');

      return view('extranet.quisommesnous', [
        'menu' => $this->menu,
        'quisommesnous' => $quisommesnous,
      ]);
    }

    public function infoslegales()
    {

      $infoslegales = $this->litJson('infoslegales');

      return view('extranet.infoslegales', [
        'menu' => $this->menu,
        'infoslegales' => $infoslegales,
      ]);
    }

    public function aide()
    {
      return "aide";
    }

}
