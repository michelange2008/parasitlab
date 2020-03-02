<?php

namespace App\Http\Controllers\Technique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Traits\LitJson;

class CoproscopiesController extends Controller
{

    use LitJson;

    protected $menu;

    public function __construct()
    {
      $this->menu = $this->litJson('menuExtranet');
    }

    public function accueil()
    {
      return view('extranet.technique.coproscopies.coproscopies', [
        'menu' => $this->menu,
        'coproscopies' => $this->litJson('coproscopies'),
      ]);
    }
    public function enpratique()
    {
      return view('extranet.analyses.enpratique', [
        'menu' => $this->menu,
        'enpratiquePrelever' => $this->litJson('enpratiquePrelever'),
        'enpratiqueConserve' => $this->litJson('enpratiqueConserve'),
        'enpratiqueEnvoi' => $this->litJson('enpratiqueEnvoi'),
      ]);
    }

    public function interpreter()
    {
      // code...
    }

}
