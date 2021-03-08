<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Labo;
use App\Http\Traits\LitJson;
/**
 * Fournit les méthodes pour l'affichage des infos (menu Infos)
 *
 */
class InfosController extends Controller
{

  use LitJson;
  /**
   * permet d'afficher le menu: lecture du json moment de la construction du controller
   *
   * @var menu
   */
  protected $menu;

  /**
   * constructeur du controlleur
   *
   * Uniquement destiné à créer la variable menu par lecture du json menuExtranet
   * pour l'affichage dans les templates
   *
   * @return array $menu
   */
  public function __construct()
  {
    $this->menu = $this->litJson('menuExtranet');
  }

  /**
   * Renvoi la vue contact
   *
   * Undocumented function long description
   *
   * @return view extranet.contact
   * @var array this->menu 
   * @var arry contacts: données lues à partir du fichier contacts.json
   */
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
