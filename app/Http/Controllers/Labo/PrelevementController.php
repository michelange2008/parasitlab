<?php

namespace App\Http\Controllers\Labo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Models\Productions\Demande;
use App\Models\Productions\Prelevement;
use App\Models\Espece;
use App\Models\Animal;
use App\Models\Troupeau;
use App\Models\Typeprod;
use App\Models\Productions\Etat;
use App\Models\Productions\Signe;
use App\Models\Analyses\Analyse;

use App\Http\Traits\LitJson;


class PrelevementController extends Controller
{
    use LitJson;

    protected $menu;

    public function __construct()
    {
      $this->menu = $this->litJson("menuLabo");
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
        //
    }

    public function createOnDemande($demande_id)
    {
      $demande = Demande::find($demande_id); // Reccherche de l'analyse correspondant à l'espèce et à l'anaacte de la demande
      $espece_id = $demande->espece->id;
      $typeprods = Typeprod::->where('espece_id', $espece_id);
      $anatype_id = $demande->anaacte->anatype->id;
      $analyse = Analyse::where(['espece_id' => $espece_id, 'anatype_id' => $anatype_id])->first();

      return view('labo.prelevementOnDemande', [
        'menu' => $this->menu,
        'demande' => $demande,
        'analyse_id' => $analyse->id,
        'especes' => Espece::all(),
        'typeprods' => $typeprods,
        'etats' => Etat::all(),
        'signes' => Signe::all(),
        'estParasite' => $this->litJson('estParasite'),
      ]);
    }

    public function storeOnDemande(Request $request)
    {

      $datas = $request->all();

      $demande = Demande::find($datas['demande_id']);

      // Création d'un nouveau troupeau si besoin
      if($datas['nouveau_troupeau'] === "true") {

        $troupeau = new Troupeau;

        $troupeau->nom = $datas['nom'];
        $troupeau->user_id = $demande->user->id;
        $troupeau->espece_id = $datas['espece_id'];
        $troupeau->typeprod_id = $datas['typeprod_id'];

        $troupeau->save();
        // On associe le nouveau troupeau à la demande en cours
        $demande->troupeau_id = $troupeau->id;

        $demande->save();

      }

      // On passe en revue les différents prélèvements
      for ($i=1; $i <= $demande->nb_prelevement ; $i++) {

        // S'il s'agit d'un prélèvement individuel
        if($datas['typeprelevement_'.$i] === "indiv") {

          // Création d'un nouvel animal si besoin
          $animal = DB::table('animals')->updateOrInsert([
            'numero' => $datas['animal_'.$i],
            'nom' => $datas['identification_'.$i],
            'troupeau_id' => $demande->troupeau->id,
          ]);
          // récupération de l'id de l'animal qui vient d'être créé
          $animal = Animal::where('numero', $datas['animal_'.$i])
          ->where('troupeau_id', $demande->troupeau_id)
          ->first();

        }
        //Création du nouveau prélèvement
        $prelevement = new Prelevement;

        $prelevement->identification = $datas['identification_'.$i] ;
        $prelevement->animal_id = ($datas['typeprelevement_'.$i] === "indiv") ? $animal->id : null;
        $prelevement->estMelange = ($datas['typeprelevement_'.$i] === "coll") ? 1 : 0;
        $prelevement->demande_id = $datas['demande_id'];
        $prelevement->analyse_id = $datas['analyse_id'];
        $prelevement->etat_id = $datas['etatPrelevement_'.$i];
        $prelevement->parasite = ($datas['parasite_'.$i] == null) ? 0 : 1 ;

        $prelevement->save();
        // On associe les signes de parasitismes cochés à ce nouveau prélèvement
        foreach ($datas as $clef => $data) {

          if(explode('_', $clef)[0] == "signe".$i) {

            $signe_id = explode('_', $clef)[1];

            $prelevement->signes()->attach($signe_id);

          }
        }
      }

      return redirect()->route('demandes.show', $demande->id);



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
