<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Espece;
use App\Models\Typeprod;

use App\Http\Traits\LitJson;

class TypeprodController extends Controller
{
  use LitJson;

  protected $menu;

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('labo');

    $this->menu = $this->litJson('menuLabo');

  }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.troupeau.typeprod', [
          'menu' => $this->menu,
          'typeprods' => Typeprod::all(),
          'especes' => Espece::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all();

        $typeprod = new Typeprod;

        $typeprod->nom = $datas['nom'];

        $typeprod->espece_id = $datas['espece_id'];

        $typeprod->save();

        return redirect()->back()->with('message', 'typeprod_add');
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
      $datas = $request->all();

      $typeprod = Typeprod::find($id);

      $typeprod->nom = $datas['nom'];

      $typeprod->espece_id = $datas['espece_id'];

      $typeprod->save();

      return redirect()->back()->with('message', 'typeprod_edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Typeprod::destroy($id);

        return redirect()->back()->with('message', 'typeprod_del');
    }
}
