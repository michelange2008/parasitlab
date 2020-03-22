<?php

namespace App\Http\Controllers\Technique;

use Illuminate\Http\Request;
use DB;

use App\Http\Controllers\Controller;

use App\Http\Traits\LitJson;
use App\Http\Traits\FormatDate;
use App\Http\Traits\BlogManager;

use App\Models\Parasitisme\Blog;
use App\Models\Parasitisme\Motclef;

class ParasitismeController extends Controller
{

      use LitJson, FormatDate, BlogManager;

      protected $menu;

      public function __construct()
      {
        $this->menu = $this->litJson('menuExtranet');
      }

      public function accueil()
      {
        $fondamentaux = $this->litJson('fondamentaux'); // articles de fond plus longs qu'un blog et listés dans le menu latéral

        // $blogs = Blog::orderBy('updated_at', 'desc')->get();

        // foreach ($blogs as $blog) {
        //   $blog->date = $blog->updated_at->format('d M Y');
        // }
        $motclefs = Motclef::all();

        $derniers_blogs = Blog::orderBy('updated_at', 'desc')->limit(5)->get(); // pour afficher les 5 derniers blogs dans le menu latéral

        $blog = Blog::orderBy('updated_at', 'desc')->first(); // dernier blog

        $blog->date = $this->dateLisible($blog->updated_at); // à qui on met une date lisible (nécessaire pour apès modifier le blog affiché en js)

        $blog->liste_motclefs = $this->listeMotclefs($blog); // et on lui ajoute la liste des motclefs affichable en une ligne séparé par des virgules

        return view('extranet.technique.parasitisme.parasitisme', [
          "menu" => $this->menu,
          "fondamentaux" => $fondamentaux,
          "motclefs" => $motclefs,
          // 'blogs' => $blogs,
          'blog' => $blog,
          'derniers_blogs' => $derniers_blogs,
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
