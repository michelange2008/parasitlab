<?php

namespace App\Http\Controllers\Labo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Productions\Demande;
use App\Models\Productions\Serie;
use App\User;
use App\Models\Espece;

use App\Http\Traits\LitJson;
use App\Http\Traits\SerieInfos;
use App\Http\Traits\EleveurInfos;
use App\Http\Traits\DemandeFactory;

use App\Fournisseurs\ListeSeriesFournisseur;

class SerieController extends Controller
{

    protected $menu;

    use LitJson, SerieInfos, EleveurInfos, DemandeFactory;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $series = Serie::all();
// dd($series);
        $fournisseur = new ListeSeriesFournisseur();

        $datas = $fournisseur->renvoieDatas($series, __('titres.list_series'), 'serie.svg', 'tableauSeries', 'demandes.create', __('boutons.add_demande'));

        return view('admin.index.pageIndex', [
            "menu" => $this->menu,
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

      // GERE PAR LE TRAIT SerieManager

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serie = Serie::find($id);

        foreach ($serie->demandes as $demande) {

          $demande = $this->demandeFactory($demande); // Trait DemandeFactory : ajoute attributs toutNegatif et nonDetecte aux prélèvements et met les dates à un format lisible

        }


        $user = $serie->demandes[0]->user;

        $user = $this->eleveurFormatNumber($user);

        $eleveurInfos = $this->eleveurInfos($user);

        $serieInfos = $this->serieInfos($serie);

        $menu = $this->litJson('menuLabo');

        return view('labo.show', [
          'menu' => $menu,
          'user' => $user,
          'eleveurInfos' => $eleveurInfos,
          'serie' => $serie,
          'serieInfos' => $serieInfos,
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
