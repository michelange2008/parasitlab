<?php

namespace App\Http\Controllers;

/**
* Controller destiné à gérer tout ce qui est public
*/
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productions\Demande;

class ExtranetController extends Controller
{

    public function accueil()
    {
      return view('extranet.accueil');
    }
}
