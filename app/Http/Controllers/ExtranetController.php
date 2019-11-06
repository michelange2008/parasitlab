<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\User;
use Illuminate\Support\Facades\DB;

class ExtranetController extends Controller
{
    public function index()
    {
      $join = User::where('usertype_id' , '=', 4)->get();
      dd($join);
      return 'coucou';
    }
}
