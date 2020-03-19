<?php

namespace App\Http\Controllers;

/**
* Controller destiné à gérer tout ce qui est public
*/
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Analyses\Anapack;

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
      $anapacks = Anapack::where('veto', true)->get();

      return view('extranet.veterinaires', [
        "menu" => $this->menu,
        "anapacks" => $anapacks,
      ]);
    }

    public function eleveurs()
    {
      $elements = $this->LitJson('presentationEleveurs');

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

      return view('extranet.infoslegales', [
        'menu' => $this->menu,
      ]);
    }

    public function aide()
    {
      return "aide";
    }

}
