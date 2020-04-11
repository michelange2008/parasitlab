<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Traits\LitJson;

class InfosController extends Controller
{

  use LitJson;

  protected $menu;

  public function __construct()
  {
    $this->menu = $this->litJson('menuExtranet');
  }



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
