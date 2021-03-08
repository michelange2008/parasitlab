<?php

namespace App\Http\Controllers\Analyses\Algorithme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Option;
use App\Models\Analyses\Anatype;

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
          'anatypes' => Anatype::where('estAnalyse', 1)->get(),
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
          $option = Option::find($id);

          $datas = $request->all();

          if($datas['type'] == "option") {

            // Stockage de l'icone en lui mettant le nom de l'abbreviation
            $file = $request->file('icone_nouvelle');
            
            if($file !== null) {

              $extension = $file->extension();
              $file->storeAs('img/algorithme', $datas['abbreviation'].'.'.$extension, 'public');
              Option::where('id', $id)->update([
                'icone' =>  $option->abbreviation.'.'.$extension,
              ]);

            }

            // Mise à jour de l'option
            Option::where('id', $id)->update([
              'nom' => $datas['nom'],
              'titre' => $datas['titre'],
              'soustitre' => $datas['soustitre'],
              'qui' => $datas['qui'],
              'quand' => $datas['quand'],
            ]);
            // Mise à jour des anaactes associés à l'option
          } elseif ($datas['type'] == "anaacte") {
            // On crée une collection pour y mettre les anaactes_id des anaactes cochés (pour faire une seule requête en base de donnée)
            $anaactes_id = Collect();
            // On passe en revue le données récupérées du formulaire
            foreach ($datas as $key => $data) {
              // On teste l'intitulé après explode pour ne garder que les names des checkbox
              if(explode('_', $key)[0] === $datas['type']) {
                // Si un name anaacte est présent, on en met la valeur (= $anaacte_id) dans la collection
                $anaactes_id->push(explode('_', $key)[1]);

              }

            }
            // On supprime toutes les anaactes associées à cette option
            $option->anaactes()->detach();
            $option->anaactes()->attach($anaactes_id);

          }

          return redirect()->route('options.index')->with('message', 'option_edit');
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
