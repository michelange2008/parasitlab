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
use App\Http\Traits\TelechargePdf;

class ExtranetController extends Controller
{

    use LitJson, TelechargePdf;

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
      ]);
    }

    public function tarifs()
    {

      return view('extranet.analyses.tarifs', [
        'menu' => $this->menu,
        'anaactes' => Anaacte::all(),
        'anatypes' => Anatype::all(),
        'date' => Carbon::now()->year,
      ]);
    }

    public function tarifsPdf()
    {
      $this->telechargePdf('tarifs', 'tarifs_parasitlab');
    }

    // public function formulairePdf(Request $request)
    // {
    //   $espece = $request->all()['espece'];
    //
    //   $this->telechargePdf('formulaire_'.$espece, 'demande_analyse_parasito_'.$espece);
    //
    // }
    //
    // public function getFormulairePdf($espece_id)
    // {
    //   $espece = Espece::find($espece_id);
    //
    //   $this->telechargePdf('formulaire_'.$espece->abbreviation, 'demande_analyse_parasito_'.$espece->abbreviation);
    // }

    public function contact()
    {
      return view('extranet.contact', [
        "menu" => $this->menu,
        'contacts' => $this->litJson('contacts'),
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
