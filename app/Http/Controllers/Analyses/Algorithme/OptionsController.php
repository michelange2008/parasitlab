<?php

namespace App\Http\Controllers\Analyses\Algorithme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Option;
use App\Models\Analyses\Anaacte;

use App\Http\Traits\LitJson;
use App\Http\Traits\ImagesManager;

class OptionsController extends Controller
{
    use LitJson, ImagesManager;

    protected $menu;

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
        return view('admin.algorithme.optionsIndex', [
          'menu' => $this->menu,
          'options' => Option::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.algorithme.optionCreate', [
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
        $request->validate([
          'abbreviation' => 'unique:options|max:15|alphanum',
        ]);
        $datas = $request->all();
        // Stockage de l'icone en lui mettant le nom de l'abbreviation
        $file = $request->file('icone_nouvelle');
        $extension = $file->extension();
        $file->storeAs('img/algorithme', $datas['abbreviation'].'.'.$extension, 'public');

        $nouvelle_option = new Option;
        $nouvelle_option->abbreviation = $datas['abbreviation'];
        $nouvelle_option->nom = $datas['nom'];
        $nouvelle_option->titre = $datas['titre'];
        $nouvelle_option->soustitre = $datas['soustitre'];
        $nouvelle_option->qui = $datas['qui'];
        $nouvelle_option->quand = $datas['quand'];
        $nouvelle_option->icone = $datas['abbreviation'].'.'.$extension;

        $nouvelle_option->save();

        return redirect()->route('options.index')->with('message', 'option_create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view('admin.algorithme.optionShow', [
        'menu' => $this->menu,
        'option' => Option::find($id),
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
        return view('admin.algorithme.optionEdit', [
          'menu' => $this->menu,
          'option' => Option::find($id),
        ]);
    }

    /**
     * Modifie l'association entre option et annacte
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAnaacte($id)
    {
        return view('admin.algorithme.optionEditAnaacte', [
          'menu' => $this->menu,
          'option' => Option::find($id),
          'anaactes' => Anaacte::all(),
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
        $datas = $request->all();
        if($datas['type'] == "option") {

          Option::where('id', $id)->update([
            'nom' => $datas['nom'],
            'titre' => $datas['titre'],
            'soustitre' => $datas['soustitre'],
            'qui' => $datas['qui'],
            'quand' => $datas['quand'],
          ]);

        } elseif ($datas['type'] == "anaactes") {

          
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $option = Option::find($id);

      $this->supprImage('storage/img/algorithme/'.$option->icone);

      Option::destroy($id);

      return redirect()->route('options.index')->with('message', 'option_destroy');
    }
}
