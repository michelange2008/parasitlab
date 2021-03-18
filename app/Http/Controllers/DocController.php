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

    /**
     * Constructeur qui remplit la variable $menu avec le tableau issu du json
     */
    public function __construct()
    {
        $this->menu = $this->litJson('menuLabo');
    }

    /**
     * Affiche la page admin/doc.blade.php pour accès à la documentation du site
     * @return \Illuminate\View\View admin/doc
     */
    function index()
    {
      return view('admin.doc',[
        'menu' => $this->menu,
      ]);
    }
}
