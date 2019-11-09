<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VeterinaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('veto');
    }

    public function index()
    {
      return "vétérinaire";
    }
}
