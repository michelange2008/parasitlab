<?php

namespace App\Http\Controllers;

/**
* Controller destiné à gérer tout ce qui est public
*/
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function aide()
    {
      return "aide";
    }
}
