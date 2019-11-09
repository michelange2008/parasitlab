<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EleveurController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('eleveur');
    }

    public function index()
    {
      return "Eleveur";
    }
}
