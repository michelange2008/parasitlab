<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
    // dd($users->where('id', 1)->get(0)->name);
    $quisommesnous = $this->litJson('quisommesnous');
    // foreach ($quisommesnous as $group) {
    //   dump($group->groupe);
    //   foreach ($group->personnes as $detail) {
    //     // foreach ($groupe->personnes as $personne) {
    //       dump($users->where('id', $detail->id)->get($detail->id - 1)->name);
    //     // }
    //   }
    // }
    // dd($quisommesnous->groupe1->groupe);
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

  public function aide()
  {
    return "aide";
  }

}
