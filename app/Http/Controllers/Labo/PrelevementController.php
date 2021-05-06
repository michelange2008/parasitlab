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
use App\Models\Productions\Melange;
use App\Models\Productions\Etat;
use App\Models\Productions\Signe;
use App\Models\Analyses\Analyse;

use App\Http\Traits\LitJson;

/**
 * Contrôleur pour la class Prelevement
 *
 * Il s'agit d'un contrôleur CRUD très modifié car un prélèvement est toujours lié
 * à une demande d'analyse:
 * + Les méthodes _index_, _create_, _store_ et _show_ ne sont pas implémentées.
 * Cela  n'a aucun sens d'afficher tous les prélèvements qui sont seulement affiché
 * avec la demande correspondantes.
 * + Il y deux méthodes _create_ en fonction du contexte de création d'un prélèvement:
 * Soit on en ajouter un seul (_createOne_), soit on ajoute tous les prélèvements
 * d'une demande (_createOnDemande_).
 * + Pour enregistrer, c'est la même chose: _storeOne_ ou _storeOnDemande_
 * + Une méthode _prelevdel_ est destinée à afficher une vue de confirmation de
 * suppression de la demande.
 *
 * @package Productions
 */
class PrelevementController extends Controller
{
    use LitJson;

    protected $menu;

    public function __construct()
    {
      $this->menu = $this->litJson("menuLabo");
    }

    /**
     * Non implémenté
     */
    public function index()
    {
        //
    }

    /**
     * Non implémenté
     */
    public function create()
    {
        //
    }

    public function definitNbPrelev(Request $request)
    {
      $datas = $request->all();

      $demande = Demande::find($datas['demande_id']);
      $demande->nb_prelevement = intval($datas['nb_prelevement']);
      $demande->save();

      return redirect()->route('prelevement.createOnDemande', $demande->id);
    }

    /**
     * Montre le formulaire pour renseigner 1 seul prélèvement d'une demande
     *
     * @return \Illuminate\View\View labo/prelevements/prelevementCreateOne
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
     * @return \Illuminate\View\View labo/prelevementOnDemande
     */

    public function createOnDemande($demande_id)
    {
      $demande = Demande::find($demande_id); // Recherche de l'analyse correspondant à l'espèce et à l'anaacte de la demande

      $troupeau = Troupeau::find($demande->troupeau_id);

      $animals = Animal::where('troupeau_id', $troupeau->id)->get();

      $espece_id = $demande->espece->id;
      $typeprods = Typeprod::where('espece_id', $espece_id)->get();
      $anatype_id = $demande->anaacte->anatype->id;
      $analyse = Analyse::where(['espece_id' => $espece_id, 'anatype_id' => $anatype_id])->first();

      return view('labo.prelevementOnDemande', [
        'menu' => $this->menu,
        'demande' => $demande,
        'troupeau' => $troupeau,
        'animals' => $animals,
        'analyse_id' => $analyse->id,
        'especes' => Espece::all(),
        'typeprods' => $typeprods,
        'etats' => Etat::all(),
        'signes' => Signe::all(),
        'estParasite' => $this->litJson('estParasite'),
        'typesprelevement' => ['indiv', 'coll'],
      ]);
    }
    /**
    * Enregistre les données de l'ensemble des prélèvements d'une demande
    * Appeler par la vue resources/views/labo/prelevementOnDemande.blade.php
    * @param  \Illuminate\Http\Request  $request
    * @return Redirect DemandeController@show
    */
    public function storeOnDemande(Request $request)
    {

      $datas = $request->all();
      // on récupère la demande car ses paramètres vont être nécessaires
      $demande = Demande::find($request->demande_id);

      // Création d'un nouveau troupeau si besoin
      if(boolval($request->nouveau_troupeau)) {

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

      $nb_prelevement = intval($request->nb_prelevement);

      for($i = 1; $i <= $nb_prelevement; $i++ ) {

        // On crée un nouveau prélèvement et on y ajoute les paramètres simples
        $prelevement = new Prelevement;
        $prelevement->demande_id = $request->demande_id;
        $prelevement->analyse_id = $request->analyse_id;
        $prelevement->etat_id = $datas['etatPrelevement_'.$i];

        //Si c'est prélèvement individuel
        if ($datas['typeprelevement_'.$i] == 'indiv' ) {

          $estMelange = false;
          $numero = $datas['animal_'.$i];
          $nom = $datas['identification_'.$i];

          $animal = Animal::firstOrCreate(
            ['numero' => $numero],
            ['troupeau_id' => $demande->troupeau_id, 'nom' => $nom]
          );

          $prelevement->animal_id = $animal->id;
          $prelevement->melange_id = null;
          $prelevement->estMelange = false;

        // Si c'est un prélèvement collectif²
        } elseif ($datas['typeprelevement_'.$i] == 'coll') {

          $estMelange = true;
          $numero = null;
          $nom = null;

          $melange = Melange::firstOrCreate(
            [ 'nom' => $datas['nom_melange_'.$i] ],
            [ 'troupeau_id' => $demande->troupeau_id ]
          );

          $prelevement->animal_id = null;
          $prelevement->melange_id = $melange->id;
          $prelevement->estMelange = true;

        }

      //
      //
      // // On passe en revue les différents prélèvements
      // for ($i=1; $i <= $demande->nb_prelevement ; $i++) {
      //
      //   // S'il s'agit d'un prélèvement individuel
      //   if($datas['typeprelevement_'.$i] === "indiv") {
      //
      //     // Création d'un nouvel animal si besoin
      //     $animal = DB::table('animals')->updateOrInsert([
      //       'numero' => $datas['animal_'.$i],
      //       'nom' => $datas['identification_'.$i],
      //       'troupeau_id' => $demande->troupeau->id,
      //     ]);
      //     // récupération de l'id de l'animal qui vient d'être créé
      //     $animal = Animal::where('numero', $datas['animal_'.$i])
      //     ->where('troupeau_id', $demande->troupeau_id)
      //     ->first();
      //
      //   }
        $prelevement->parasite = $datas['parasite_'.$i];

        $prelevement->save();

        // On associe les signes de parasitismes cochés à ce nouveau prélèvement
        $prelevement->signes()->detach();

        if(array_key_exists('signe_'.$i, $datas))
        {

          $prelevement->signes()->attach($datas['signe_'.$i]);

        }
        //
        // foreach ($datas as $clef => $data) {
        //
        //   if(explode('_', $clef)[0] == "signe".$i) {
        //
        //     $signe_id = explode('_', $clef)[1];
        //
        //     $prelevement->signes()->attach($signe_id);
        //
        //   }
        // }
      }
// dd('');
      return redirect()->route('demandes.show', $demande->id);

    }
    /**
    * Enregistre les données d'un SEUL prélèvement d'une demande (prélèvement non encore renseigné)
    *
    * @param  \Illuminate\Http\Request  $request
    * @return Redirect ResultatController@edit
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

        return redirect()->route('resultats.edit', $demande->id);

    }

    /**
     * Non implémenté
     */
    public function store(Request $request)
    {
        //
    }

    /**
    * Non implémenté
     */
    public function show($id)
    {
        //
    }

    /**
     * Affiche un formulaire pour modifier un prélèvement
     *
     * @param  int  $id Id du prélèvement
     * @return \Illuminate\View\View labo/prelevements/prelevementEdit
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
     * Met à jour le prélèvement modifié
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id Id ud prélèvement
     * @return redirect DemandeController@show
     */
    public function update(Request $request, $id)
    {
        $datas = $request->all();

        $prelevement = Prelevement::find($id);

        $prelevement->identification = $datas['identification'];
        $prelevement->etat_id = $datas['etatPrelevement_'.$id];
        // Prendre en compte le choix fait sur l'état parasité ou non de l'animal
        // correspondant au prélèvement (boutons radio)
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


        return redirect()->route('demandes.show', $prelevement->demande->id)->with('message', __('prelev_edit'));

    }

    /**
    * Methode de confirmation de suppression d'un prélévement
    *
    * @param int $prelevement_id Id du prélèvement
    * @return \Illuminate\View\View labo/prelevements/prelevdel
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
     * @param  int  $id Id du prélèvement
     * @return redirect ResultatController@edit
     */
    public function destroy($id)
    {

        $prelevement = Prelevement::find($id);

        $demande_id = $prelevement->demande_id;

        $demande = Demande::find($demande_id);

        $demande->nb_prelevement = $demande->nb_prelevement - 1;

        $demande->save();

        Prelevement::destroy($id);

        return redirect()->route('demandes.show', $demande_id)->with('message', __('prelev_del'));
    }

}
