<?php

namespace App\Http\Controllers\Analyses\Algorithme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\LitJson;

class BaseController extends Controller
{
    use LitJson;

    protected $menu;

    public function __construct()
    {
      $this->menu = $this->litJson('menuLabo');
    }


    public function index()
    {
      return view('admin.algorithme.base', [
        'menu' => $this->menu,
        ]) ;
    }




}
