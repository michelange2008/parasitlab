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

/**
 * Gère l'affichage de la partie Express du site, accessible sans authentification
 *
 * Dans le menu Extranet, le menu Express permet d'avoir accès à trois sousmenus:
 * + Analyses proposées et tarifs
 * + Téléchargement d'un formulaire
 * + Demande d'un kit d'envoi
 *
 * @package Public
 */
class ExpressController extends Controller
{
  use LitJson, Personne;

 /**
 * Tableau avec les éléments du menu en accès public
 * @var array
 */
 protected $menu;

  /**
  * Constructeur qui remplit la variable $menu avec le tableau issu du json
  */
  public function __construct()
  {
    $this->menu = $this->litJson('menuExtranet');
  }

  /**
   * Renvoie la vue avec les tarifs (extranet/analyses/tarifs)
   *
   * @return \Illuminate\View\View extranet/analyses/tarifs
   */
  public function tarifs()
  {

    return view('extranet.analyses.tarifs', [
      'menu' => $this->menu,
      'anaactes' => Anaacte::where('estActif', true)->get(),
      'anatypes' => Anatype::all(),
      'date' => Carbon::now()->year,
    ]);
  }

  /**
  * Page de formulaire de demande d'envoi d'un kit
  *
  * Ce formulaire demande les infos suivantes:
  * + Nom et coordonnées du demandeur
  * + Nombre de kits demandés
  * + Espèce concernée
  *
  * @return \Illuminate\View\View extranet/analyses/enpratique/envoiKit
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

  /**
  * Récupération des données du formulaire de demande d'envoi de kit
  *
  * Envoi un mail à contact@parasitlab.org pour prévenir de la demande
  * Puis renvoie une page qui dit que la demande est bien arrivée
  *
  * @param App\Http\Requests\FormulaireEnvoiKit $request
  * @return \Illuminate\View\View extranet/analyses/enpratique/envoiKitOk
  * @see \App\Http\Requests\FormulaireEnvoiKit
  * @see \App\Mail\EnvoiKit
  */
  public function envoiKitStore(FormulaireEnvoiKit $request)
  {

    $demande = $request->validated();

    $mail = Mail::to(config('mail')['from']['address'])->send(new EnvoiKit($demande));

    return view('extranet.analyses.enpratique.envoiKitOk');

  }

}
