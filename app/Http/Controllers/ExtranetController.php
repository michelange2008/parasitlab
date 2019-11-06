<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productions\Demande;
use App\User;
use Illuminate\Support\Facades\DB;

class ExtranetController extends Controller
{
    public function index()
    {
      $join = Demande::first();
      dd($join);
      return 'coucou';
    }
}
