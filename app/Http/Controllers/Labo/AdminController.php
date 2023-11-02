<?php

namespace App\Http\Controllers\Labo;

use App\Http\Controllers\Controller;
use App\Http\Traits\LitJson;
use Illuminate\Http\Request;

/**
 * Affichage du tableau de bord des utilisateurs Labo
 */
class AdminController extends Controller
{
    use LitJson;
    /**
     * Affiche un tableau de bord pour les utilisateurs 
     * du groupe Labo
     * @return View dashboard.blade.php
     **/
    public function index()
    {
        return view('admin.dashboard', [
            'menu' => $this->litJson('menuLabo'),
        ]);
    }
}
