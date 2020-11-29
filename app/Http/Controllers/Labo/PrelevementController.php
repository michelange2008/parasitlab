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
    /**
     * Montre le formulaire pour renseigné 1 seul prélèvement d'une demande
     *
     * @return \Illuminate\Http\Response
     */

    public function createOne($demande_id, $rang)
    {
      $demande = Demande::find($demande_id); // Reccherche de l'analyse correspondant à l'espèce et à l'anaacte de la demande
      $espece_id = $demande->espece->id;
      $typeprods = Typeprod::where('espece_id', $espece_id)->get();
      $anatype_id = $demande->anaacte->anatype->id;
      $analyse = Analyse::where(['espece_id' => $espece_id, 'anatype_id' => $anatype_id])->first();

      return view('labo.prelevements.prelevementCreateOne', [
        'menu' => $this->menu,
        'demande' => $demande,
        'rang' => $rang,
        'analyse_id' => $analyse->id,
        'especes' => Espece::all(),
        'typeprods' => $typeprods,
        'etats' => Etat::all(),
        'signes' => Signe::all(),
        'estParasite' => $this->litJson('estParasite'),
      ]);
    }

    /**
     * Montre le formulaire pour renseigner TOUS les prélèvements d'une demande
     *
     * @return \Illuminate\Http\Response
     */

    public function createOnDemande($demande_id)
    {
      $demande = Demande::find($demande_id); // Reccherche de l'analyse correspondant à l'espèce et à l'anaacte de la demande
      $espece_id = $demande->espece->id;
      $typeprods = Typeprod::where('espece_id', $espece_id)->get();
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
    /**
    * Enregistre les données de l'ensemble des prélèvements d'une demande
    */
    public function storeOnDemande(Request $request)
    {

      $datas = $request->all();

      $demande = Demande::find($datas['demande_id']);

      // Création d'un nouveau troupeau si besoin
      if($datas['nouveau_troupeau'] === "true") {

        $troupeau = new Troupeau;

        $troupeau->nom = $datas['nom'];
        $troupeau->user_id = $demande->user->id;
        $troupeau->espece_id = $demande->espece->id;
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
    * Enregistre les données d'un SEUL prélèvement d'une demande (prélèvement non encore renseigné)
    */

    public function storeOne(Request $request)
    {

      $datas = $request->all();

      $demande = Demande::find($datas['demande_id']);

      $rang = $datas['rang'];

        // S'il s'agit d'un prélèvement individuel
        if($datas['typeprelevement_'.$rang] === "indiv") {

          // Création d'un nouvel animal si besoin
          $animal = DB::table('animals')->updateOrInsert([
            'numero' => $datas['animal_'.$rang],
            'nom' => $datas['identification_'.$rang],
            'troupeau_id' => $demande->troupeau->id,
          ]);
          // récupération de l'id de l'animal qui vient d'être créé
          $animal = Animal::where('numero', $datas['animal_'.$rang])
          ->where('troupeau_id', $demande->troupeau_id)
          ->first();

        }
        //Création du nouveau prélèvement
        $prelevement = new Prelevement;

        $prelevement->identification = $datas['identification_'.$rang] ;
        $prelevement->animal_id = ($datas['typeprelevement_'.$rang] === "indiv") ? $animal->id : null;
        $prelevement->estMelange = ($datas['typeprelevement_'.$rang] === "coll") ? 1 : 0;
        $prelevement->demande_id = $datas['demande_id'];
        $prelevement->analyse_id = $datas['analyse_id'];
        $prelevement->etat_id = $datas['etatPrelevement_'.$rang];
        $prelevement->parasite = ($datas['parasite_'.$rang] == null) ? 0 : 1 ;

        $prelevement->save();
        // On associe les signes de parasitismes cochés à ce nouveau prélèvement
        foreach ($datas as $clef => $data) {

          if(explode('_', $clef)[0] == "signe".$rang) {

            $signe_id = explode('_', $clef)[1];

            $prelevement->signes()->attach($signe_id);

          }
        }

        $demande->nb_prelevement = $demande->nb_prelevement + 1;
        $demande->save();

      return redirect()->route('resultats.edit', $demande->id);

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

        return view('labo.prelevements.prelevementEdit', [
          'menu' => $this->menu,
          'prelevement' => Prelevement::find($id),
          'etats' => Etat::all(),
          'signes' => Signe::all(),
          'estParasite' => $this->litJson('estParasite'),
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

        $prelevement = Prelevement::find($id);

        $prelevement->identification = $datas['identification'];
        $prelevement->etat_id = $datas['etatPrelevement_'.$id];

        switch ($datas['parasite_'.$id]) {
          case '0':

              $prelevement->parasite = 0;

            break;

          case '1':

            $prelevement->parasite = 1;

          break;

          default:

            $prelevement->parasite = null;

            break;

        }

        $prelevement->signes()->detach();

        foreach ($datas as $key => $value) {

          if(explode('_', $key)[0] == "signe".$id) {

            $prelevement->signes()->attach(explode('_', $key)[1]);

          }
        }

        $prelevement->save();


        return redirect()->route('resultats.edit', $prelevement->demande->id)->with('message', __('prelev_edit'));

    }

    /**
    * Methode de confirmation de suppression d'un prélévement
    */
    public function prelevdel($prelevement_id)
    {

      return view('labo.prelevements.prelevdel', [
        'prelevement_id' => $prelevement_id,
      ]);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $prelevement = Prelevement::find($id);

        $demande_id = $prelevement->demande_id;

        $demande = Demande::find($demande_id);

        $demande->nb_prelevement = $demande->nb_prelevement - 1;

        $demande->save();

        Prelevement::destroy($id);

        return redirect()->route('resultats.edit', $demande_id)->with('message', __('prelev_del'));
    }
}
