<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormulaireEnvoiKit;
use Carbon\Carbon;

use Mail;
use Illuminate\Mail\Mailer;
use App\Mail\EnvoiKit;


use App\Models\Analyses\Anaacte;
use App\Models\Analyses\Anatype;
use App\Models\Espece;

use App\Http\Traits\Personne;
use App\Http\Traits\LitJson;

class ExpressController extends Controller
{
  use LitJson, Personne;

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
  * Page de formulaire de demande d'envoi d'un kit
  */
  public function envoiKit()
  {

    $cout_kit = Anaacte::select('pu_ht')->where('abbreviation', 'kit envoi')->first()->pu_ht;
// TODO: problème avec la personne
    return view('extranet.analyses.enpratique.envoiKit', [
      'menu' => $this->menu,
      'pays' => $this->litJson('pays'),
      'user' => auth()->user(),
      'personne' => $this->personne(auth()->user()),
      'cout_kit' => $cout_kit,
      'especes' => Espece::all(),
    ]);
  }

  /*
  * Récupération des données du formulaire ci-dessus
  */
  public function envoiKitStore(FormulaireEnvoiKit $request)
  {

    $demande = $request->validated();

    $mail = Mail::to(config('mail')['from']['address'])->send(new EnvoiKit($demande));

    return view('extranet.analyses.enpratique.envoiKitOk');

  }

}
