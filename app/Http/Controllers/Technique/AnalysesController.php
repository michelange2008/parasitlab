<?php

namespace App\Http\Controllers\Technique;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Analyses\Anaacte;
use App\Models\Analyses\Anatype;
use App\Models\Algorithme\Categorie;
use App\Models\Espece;
use App\Models\Age;

use App\Http\Traits\LitJson;

class AnalysesController extends Controller
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
        'route' => 'analyses.coproscopies',
        'analysesProgress' => $this->litJson('analysesProgress'),
        'coproscopies' => $this->litJson('coproscopies'),
      ]);
    }
    public function choisir()
    {
      session()->put('choisirFirst', true);

      $anatypes = Anatype::where('estAnalyse', true)->get();

      return view('extranet.analyses.choisir', [
        'menu' => $this->menu,
        'route' => 'analyses.choisir',
        'analysesProgress' => $this->litJson('analysesProgress'),
        'especes' => Espece::all(),
        'ages' => Age::all(),
        'categories' => Categorie::all(),
        'anatypes' => $anatypes,
        'choisir_2' => $this->litJson('choisir_2'),
      ]);
    }

    public function enpratique()
    {

      return view('extranet.analyses.enpratique', [
        'menu' => $this->menu,
        'route' => 'analyses.enpratique',
        'analysesProgress' => $this->litJson('analysesProgress'),
        'qui_quand' => $this->litJson('qui_quand'),
        'terre_lot' => $this->litJson('terre_lot'),
        'enpratiqueConserve' => $this->litJson('enpratiqueConserve'),
        'enpratiqueEnvoi' => $this->litJson('enpratiqueEnvoi'),
      ]);
    }

    public function interpretation()
    {
      return view('extranet.technique.coproscopies.interpretation', [
        'menu' => $this->menu,
        'route' => 'analyses.interpretation',
        'analysesProgress' => $this->litJson('analysesProgress'),
        'interpreter' => $this->litJson('interpretation'),
      ]);
    }

}
