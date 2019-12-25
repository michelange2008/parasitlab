<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usertype;

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
