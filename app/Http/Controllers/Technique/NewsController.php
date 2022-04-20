<?php

namespace App\Http\Controllers\Technique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;
use App\Fournisseurs\ListeNewsFournisseur;

use App\Http\Traits\LitJson;
use App\Http\Traits\ImagesManager;

class NewsController extends Controller
{
    use LitJson, ImagesManager;

    protected $menu;

    /**
     * Constructeur qui remplit la variable $menu avec le tableau issu du json
     */
    public function __construct()
    {
      $this->menu = $this->litJson('menuLabo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();

        $fournisseur = new ListeNewsFournisseur();

        $datas = $fournisseur->renvoieDatas($news, __('titres.list_news'), 'interpreter.svg', 'tableauNews', 'news.create', __('boutons.add_news'));

        return view('extranet.news.news_index', [
          'menu' => $this->menu,
          'datas' => $datas,
          'news' => $news,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('extranet.news.news_create', [
          'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      News::where('display', 1)->update(['display' => 0]);

      $file = $request->file('news_img_nouvelle');
      $img = $file->hashName();
      $file->storeAs('img/news', $img, 'public');

      $nouvelle_news = new News;

      $nouvelle_news->title = $request->title;
      $nouvelle_news->content = $request->content;
      $nouvelle_news->conclusion = $request->conclusion;
      $nouvelle_news->img = $img;
      $nouvelle_news->display = true;

      $nouvelle_news->save();

      return redirect()->route('news.index')->with('message', 'news_store');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('extranet.news.news_edit', [
          'menu' => $this->menu,
          'new' => News::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('extranet.news.news_edit', [
        'menu' => $this->menu,
        'new' => News::find($id),
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $img = $request->news_img_default;

      if($request->news_img_nouvelle !== null) {
        // Si on a choisit une nouvelle image, on la stocke
        $file = $request->file('news_img_nouvelle');
        $img = $file->hashName();
        $file->storeAs('img/news', $img, 'public');
        // et on supprime l'ancienne
        $news_img_avec_chemin = 'storage/img/news/'.News::find($id)->img;
        $this->supprImage($news_img_avec_chemin);
      }

      News::where('id', $id)
          ->update([
            'title' => $request->title,
            'content' => $request->content,
            'conclusion' => $request->conclusion,
            'img' => $img,
          ]);

      return redirect()->route('news.index')->with('message', 'news_edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $news_img_avec_chemin = 'storage/img/news/'.News::find($id)->img;

      $this->supprImage($news_img_avec_chemin);

      News::destroy($id);

      return redirect()->route('news.index')->with('message', 'news_del');
    }
    /*
    // Choix de la news à afficher à partir de la page des listes de news (index)
    // Passe toutes les news à 0 dans la colone display, sauf celle qui a été choisie
    // Si choix = "aucune" c'est la valeur 0 qui est renvoyé.
     */
    public function newsChoice(Request $request)
    {
      News::where('display', 1)->update(['display' => 0]);

      if($request->news_choice !== "0") {

        News::where('id', $request->news_choice)->update(['display' => 1]);

      }

      return redirect()->route('news.index');

    }

    public function phpinfo()
    {
      phpinfo();
    }
}
