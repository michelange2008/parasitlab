<?php

namespace App\Http\Controllers\Intranet;

/**
* Controller destiné à gérer tout ce qui est lié à un utilisateur non administrateur
*/

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IntranetController extends Controller
{

    public function intranetIndex()
    {
      return "intranet index";
    }
}
