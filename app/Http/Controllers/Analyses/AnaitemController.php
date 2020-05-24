<?php

namespace App\Http\Controllers\Analyses;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Analyses\Anaitem;
use App\Models\Analyses\Unite;
use App\Models\Analyses\Qtt;

use App\Fournisseurs\ListeAnaitemsFournisseur;
use App\Http\Traits\LitJson;
use App\Http\Traits\ImagesManager;

class AnaitemController extends Controller
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
        $anaitems = Anaitem::all();

        $fournisseur = new ListeAnaitemsFournisseur();

        $datas = $fournisseur->renvoieDatas($anaitems, __('titres.list_anaitems'), "oeuf.jpg", 'tableauAnaitems', 'anaitems.create', __('boutons.add_anaitem'));

        return view('admin.index.pageIndex', [
          'menu' => $this->menu,
          'datas' => $datas,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.anaitems.anaitemCreate', [
          'menu' => $this->menu,
          'unites' => Unite::all(),
          'qtts' => Qtt::all(),
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
        $datas = $request->validate([
          'abbreviation' => 'bail|required|unique:anaitems|max:4',
          'nom' => 'required|max:191',
          'unite' =>'numeric',
          'qtt' => 'numeric',
        ]);

        $file = $request->file('image_nouvelle');
        $extension = $file->extension();
        $image_nouvelle = $datas['abbreviation'].'.'.$extension;

        $image = Image::make($file)->fit(200, 200)->save('storage/img/icones/oeufs/'.$image_nouvelle);

        $anaitem = new Anaitem();

        $anaitem->abbreviation = $datas['abbreviation'];

        $anaitem->nom = $datas['nom'];

        $anaitem->unite_id = $datas['unite'];

        $anaitem->qtt_id = $datas['qtt'];

        $anaitem->image = $image_nouvelle;

        $anaitem->save();

        return redirect()->route('anaitems.index')->with('message', 'anaitem_create');
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
        return view('admin.anaitems.anaitem', [
          'menu' => $this->menu,
          'anaitem' => Anaitem::find($id),
          'unites' => Unite::all(),
          'qtts' => Qtt::all(),
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
        $file = $request->file('image_nouvelle');
        // dd(url('storage/img/icones/oeufs/'.$datas['image_default']));
        // dd($datas['abbreviation']);
        if($file === null) {

          $image_nouvelle = $datas['image_default'];

        } else {

          $image_nouvelle = $datas['abbreviation'].'.'.$file->extension();

          $this->supprImage('storage/img/icones/oeufs/'.$datas['image_default']);

          $image = Image::make($file)->fit(200, 200)->save('storage/img/icones/oeufs/'.$image_nouvelle);

        }

        DB::table('anaitems')->where('id', $id)->update([
          'abbreviation' => $datas['abbreviation'],
          'nom' => $datas['nom'],
          'unite_id' => $datas['unite'],
          'qtt_id' => $datas['qtt'],
          'image' => $image_nouvelle,
        ]);

        return redirect()->route('anaitems.index')->with('message', 'anaitem_updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anaitem = Anaitem::find($id);

        Anaitem::destroy($id);

        $this->supprImage('storage/img/icones/oeufs/'.$anaitem->image);

        return redirect()->route('anaitems.index')->with('message', 'anaitem_destroy');
    }
}
