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

    // Renvoie à lapage coprosocopies.blade avec coproscopies.json et lang coproscopies.php sur l'adresse parasitlab/coproscopies
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
        'qui_quand' => $this->litJson('qui_quand'),
        'terre_lot' => $this->litJson('terre_lot'),
        'enpratiqueConserve' => $this->litJson('enpratiqueConserve'),
        'enpratiqueEnvoi' => $this->litJson('enpratiqueEnvoi'),
      ]);
    }

    public function interpreter()
    {
      return view('extranet.technique.coproscopies.interpreter', [
        'menu' => $this->menu,
        'interpreter' => $this->litJson('interpreter'),
      ]);
    }

}
