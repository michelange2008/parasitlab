<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Espece;

class EspeceController extends Controller
{
    // Fonction destinée à permettre le choix d'espece pour le formulaire
    public function listeEspeces()
    {
      $especes =Espece::all();

      return json_encode($especes);

    }
}
