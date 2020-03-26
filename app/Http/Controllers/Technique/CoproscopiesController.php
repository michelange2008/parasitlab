<?php

namespace App\Http\Controllers\Technique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Traits\LitJson;

class CoproscopiesController extends Controller
{

    use LitJson;

    protected $menu;
    protected $sousmenuAnalyses;

    public function __construct()
    {
      $this->menu = $this->litJson('menuExtranet');
      $this->sousmenuAnalyses = $this->litJson('sousmenuAnalyses');
    }

    public function accueil()
    {
      return view('extranet.technique.coproscopies.coproscopies', [
        'menu' => $this->menu,
        'sousmenuAnalyses' => $this->sousmenuAnalyses,
        'coproscopies' => $this->litJson('coproscopies'),
      ]);
    }
    public function enpratique()
    {
      return view('extranet.analyses.enpratique', [
        'menu' => $this->menu,
        'sousmenuAnalyses' => $this->sousmenuAnalyses,
        'enpratiquePrelever' => $this->litJson('enpratiquePrelever'),
        'terre_lot' => $this->litJson('terre_lot'),
        'enpratiqueConserve' => $this->litJson('enpratiqueConserve'),
        'enpratiqueEnvoi' => $this->litJson('enpratiqueEnvoi'),
      ]);
    }

    public function interpreter()
    {
      return view('extranet.technique.coproscopies.interpreter', [
        'menu' => $this->menu,
        'sousmenuAnalyses' => $this->sousmenuAnalyses,
        'interpreter' => $this->litJson('interpreter'),
      ]);
    }

}
