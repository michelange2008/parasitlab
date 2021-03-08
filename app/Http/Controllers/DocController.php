<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\LitJson;

/**
 * Controller destiné à présenter la documentation sur le site
 *
 * La document sur le site est issue principalement de phpDocumentor.
 * On y a accès via le menu "A propos de"
 */
class DocController extends Controller
{
    use LitJson;

    protected $menu;

    public function __construct()
    {
        $this->menu = $this->litJson('menuLabo');
    }


    function index()
    {
      return view('admin.doc',[
        'menu' => $this->menu,
      ]);
    }
}
