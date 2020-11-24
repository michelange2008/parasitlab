<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\LitJson;
use App\User;
use App\Models\Espece;
use App\Models\Productions\Demande;
use App\Models\Analyses\Anaitem;

class ExportsController extends Controller
{
  use LitJson;

  protected $menu;
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function __construct()
  {
    $this->menu = $this->litJson("menuLabo");
  }


    public function choix()
    {

      $users = User::all();
      $demandes = Demande::all();
      $especes = Espece::all();
      $anaitems = Anaitem::all();

      return view('exports.choix', [
        'menu' => $this->menu,
      ]);

    }

    public function exportcsv(Request $request)
    {



    }
}
