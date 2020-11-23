<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormulaireEnvoiPack;
use Carbon\Carbon;

use Mail;
use Illuminate\Mail\Mailer;
use App\Mail\EnvoiPack;


use App\Models\Analyses\Anaacte;
use App\Models\Analyses\Anatype;

use App\Http\Traits\UserTypeOutil;
use App\Http\Traits\LitJson;

class ExpressController extends Controller
{
  use LitJson, UserTypeOutil;

  protected $menu;

  public function __construct()
  {
    $this->menu = $this->litJson('menuExtranet');
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

  /*
  * Page de formulaire de demande d'envoi d'un pack
  */
  public function envoiPack()
  {

    $cout_pack = Anaacte::select('pu_ht')->where('abbreviation', 'kit envoi')->first()->pu_ht;

    return view('extranet.analyses.enpratique.envoiPack', [
      'menu' => $this->menu,
      'pays' => $this->litJson('pays'),
      'user' => auth()->user(),
      'personne' => $this->personne(auth()->user()),
      'cout_pack' => $cout_pack,
    ]);
  }

  /*
  * Récupération des données du formulaire ci-dessus
  */
  public function envoiPackStore(FormulaireEnvoiPack $request)
  {

    $demande = $request->validated();

    $mail = Mail::to(config('mail')['from']['address'])->send(new EnvoiPack($demande));

    return view('extranet.analyses.enpratique.envoiPackOk');

  }

}
