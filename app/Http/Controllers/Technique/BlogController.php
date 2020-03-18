<?php

namespace App\Http\Controllers\Technique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;

use App\User;
use App\Models\Parasitisme\Blog;
use App\Models\Parasitisme\Motclef;

class BlogController extends Controller
{
    use LitJson, UserTypeOutil;

    protected $menu;

    public function __construct()
    {
      $this->menu = $this->litJson('menuExtranet');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $laboratoires = User::where('usertype_id', $this->userTypeLabo()->id)->get();
        return view('extranet.technique.blog.create', [
          'menu' => $this->menu,
          'laboratoires' => $laboratoires,
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
        $validateData = $request->validate([
          'titre' => 'required|unique:blogs|max:191',
          'contenu' => 'required',
          'auteur' => 'required',
          'image' => 'file|image|required',
          'motclefs' => '',
        ]);

        $image = $request->file('image');

        $illustration = $image->store('img/blog', 'public');

        $nouveau_blog = new Blog;

        $nouveau_blog->titre = $validateData['titre'];
        $nouveau_blog->contenu = $validateData['contenu'];
        $nouveau_blog->user_id = $validateData['auteur'];
        $nouveau_blog->image = explode('/', $illustration)[2];

        $nouveau_blog->save();

        $tableau_motclefs = preg_split("/[,;]+/", $validateData['motclefs']);

        foreach ($tableau_motclefs as $motclef) {

          $motclef = Motclef::firstOrCreate(['motclef' => trim($motclef)]);

          $nouveau_blog->motclefs()->attach($motclef->id);

        }

        return redirect()->route('parasitisme');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
