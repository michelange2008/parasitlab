<?php

namespace App\Http\Controllers;

/**
* Controller destiné à gérer tout ce qui est public
*/
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Analyses\Anatype;
use App\Models\Analyses\Anaacte;
use App\Models\Espece;

use App\Http\Traits\LitJson;

class AccueilController extends Controller
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
        'carousel' => $this->litJson('carousel'),
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
        "contenu" => $this->litJson('cavaliers'),
      ]);
    }


}
