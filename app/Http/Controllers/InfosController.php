<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Labo;
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
    $users = User::all();

    $quisommesnous = $this->litJson('quisommesnous');

    return view('extranet.quisommesnous', [
      'menu' => $this->menu,
      'quisommesnous' => $quisommesnous,
      'users' => $users,
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

  public function rgpd()
  {
    return response()->file('storage/pdf/rgpd.pdf');
  }

  public function aide()
  {
    return "aide";
  }

}
