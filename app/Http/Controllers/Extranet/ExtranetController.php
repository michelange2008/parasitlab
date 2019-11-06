<?php

namespace App\Http\Controllers\Extranet;

/**
* Controller destiné à gérer tout ce qui est public
*/


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ExtranetController extends Controller
{

    public function accueil()
    {
      $data = User::all();
      return "coucou";
    }
}
