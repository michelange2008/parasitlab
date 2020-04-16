<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\LitJson;

class TraductionsController extends Controller
{
  use LitJson;

  protected $menu;

    public function __construct()
    {
        $this->menu = $this->litJson('menuLabo');
    }


    public function index()
    {

      return redirect('/translations');
    }
}
