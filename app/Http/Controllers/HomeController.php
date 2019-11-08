<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usertype;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $usertype = Usertype::all();
      // dd(auth()->user()->usertype->route);
      
      if(!$usertype->contains(auth()->user()->usertype_id)) 
      {
        
        return redirect()->route('accueil');
        
      }
      
      else
      {
        
        return redirect()->route((auth()->user()->usertype->route));
        
      }
        return view('home');
    }
}
