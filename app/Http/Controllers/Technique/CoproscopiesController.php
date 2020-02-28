<?php

namespace App\Http\Controllers\Technique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Traits\LitJson;

class CoproscopiesController extends Controller
{

        use LitJson;

        protected $menu;

        public function __construct()
        {
          $this->menu = $this->litJson('menuExtranet');
        }

        public function accueil()
        {
          return view('extranet.technique.coproscopies.coproscopies', [
            "menu" => $this->menu,
          ]);
        }

}
