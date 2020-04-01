<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Espece;

class EspeceController extends Controller
{
    public function listeEspeces()
    {
      return json_encode(Espece::all());
    }
}
