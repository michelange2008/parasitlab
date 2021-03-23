<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\LitJson;

/**
 * Controleur destiné à renvoyer la vue de traduction
 */
class TraductionsController extends Controller
{
  use LitJson;

  protected $menu;

    public function __construct()
    {
        $this->menu = $this->litJson('menuLabo');
    }

    /**
     * Renvoie à la route /translations
     *
     * cf. barryvdh/laravel-translation-manager
     * 
     * @return route
     */
    public function index()
    {

      return redirect('/translations');
    }
}
