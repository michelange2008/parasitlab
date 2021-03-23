<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usertype;

/**
 * Contrôleur très simple qui ne fait que renvoyer la liste des routes des Usertypes
 *
 * @deprecated ?
 * @package Utilisateurs
 */
class UsertypeController extends Controller
{

  public function liste()
  {
    $usertypes = Usertype::select('route')->get();

    $liste = [];

    foreach ($usertypes as $usertype) {
      $liste[] = $usertype->route;
    }

    return $liste;
  }
}
