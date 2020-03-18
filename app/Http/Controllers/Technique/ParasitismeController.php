<?php

namespace App\Http\Controllers\Technique;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Traits\LitJson;
use App\Http\Traits\FormatDate;

use App\Models\Parasitisme\Blog;

class ParasitismeController extends Controller
{

      use LitJson, FormatDate;

      protected $menu;

      public function __construct()
      {
        $this->menu = $this->litJson('menuExtranet');
      }

      public function accueil()
      {
        $fondamentaux = $this->litJson('fondamentaux');

        $articles = Blog::orderBy('updated_at', 'desc')->get();

        foreach ($articles as $article) {
          $article->date = $article->updated_at->format('d M Y');
        }


        $derniers_articles = Blog::orderBy('updated_at', 'desc')->limit(5)->get();

        return view('extranet.technique.parasitisme.parasitisme', [
          "menu" => $this->menu,
          "fondamentaux" => $fondamentaux,
          'articles' => $articles,
          'derniers_articles' => $derniers_articles,
        ]);
      }

      public function resistances()
      {
        return view('extranet.technique.parasitisme.resistances', [
          'menu' => $this->menu,
        ]);
      }

      public function surdispersion()
      {
        return view('errors.entravaux');
      }

      public function entomofaune()
      {
        return view('extranet.technique.parasitisme.entomofaune', [
          'menu' => $this->menu,
        ]);
      }

      public function fondamentaux($id)
      {
        $fondamentaux = $this->litJson('fondamentaux');

        $article = $fondamentaux->$id;

        return view('extranet.technique.parasitisme.fondamentaux', [
          'menu' => $this->menu,
          'article' => $article,
        ]);
      }

}
