<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Labo;
use App\Http\Traits\LitJson;
/**
 * Fournit les méthodes pour l'affichage des infos (menu Infos)
 *
 * @package Public
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
   * @return \Illuminate\View\View extranet.contact
   * @var array this->menu
   * @var array contacts: données lues à partir du fichier contacts.json
   */
  public function contact()
  {
    return view('extranet.contact', [
      "menu" => $this->menu,
      'contacts' => $this->litJson('contacts'),
    ]);
  }

  /**
   * Renvoie la vue quisommesnous
   * @return \Illuminate\View\View extranet/quisommesnous
   * @return [type] [description]
   */
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

  /**
   * Renvoie la vue infolégales
   * @return \Illuminate\View\View extranet.infoslegales
   */
  public function infoslegales()
  {

    $infoslegales = $this->litJson('infoslegales');

    return view('extranet.infoslegales', [
      'menu' => $this->menu,
      'infoslegales' => $infoslegales,
    ]);
  }

  /**
   * Affiche le fichier pdf avec les infos RGPD
   * @return file storage/pdf/rgpd.pdf
   */
  public function rgpd()
  {
    return response()->file('storage/pdf/rgpd.pdf');
  }

  public function aide()
  {
    return "aide";
  }

}
