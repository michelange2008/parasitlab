<?php

namespace App\Http\Controllers\Extranet;

/**
* Controller destiné à gérer tout ce qui est public
*/


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productions\Demande;

class ExtranetController extends Controller
{

    public function accueil()
    {
      $demande = Demande::first();
      dd($demande->facture);
      return "coucou";
    }
}
