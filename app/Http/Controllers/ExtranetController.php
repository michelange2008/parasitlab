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
      // $this->menu = $this->litJson('menuExtranet');
    }

    public function accueil()
    {
      return view('extranet.accueil', [
        // 'menu' => $this->menu,
        // 'accueilEntetes' => $this->litJson('accueilEntetes'),
        // 'accueilPastilles' => $this->litJson('accueilPastilles'),
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

    public function contact()
    {
      return view('extranet.contact', [
        "menu" => $this->menu,
      ]);
    }

    public function aide()
    {
      return "aide";
    }

}
