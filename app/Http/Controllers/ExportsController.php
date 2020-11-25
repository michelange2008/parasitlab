<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Espece;
use App\Models\Productions\Demande;
use App\Models\Productions\Resultat;
use App\Models\Analyses\Anaitem;

use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;

class ExportsController extends Controller
{
  use LitJson, UserTypeOutil;

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
      $especes = Espece::orderBy('nom')->get();
      $anaitems = Anaitem::orderBy('nom')->get();
      $formats = $this->litJson('formats_export');

      return view('exports.choix', [
        'menu' => $this->menu,
        'formats' => $formats,
        'especes' => $especes,
        'users' => $users,
        'eleveurs' => User::where('usertype_id', $this->userTypeEleveur()->id)->orderBy('name')->get(),
        'vetos' => User::where('usertype_id', $this->userTypeVeto()->id)->orderBy('name')->get(),
        'anaitems' => $anaitems,
      ]);

    }

    public function export(Request $request)
    {
      $datas = $request->all();

      $personne = $datas['personne'];

      $demande = Demande::where('user_id', 'like', '%')->get();

      dd($demande);
    }

    public function exportcsv($export)
    {



    }
}
