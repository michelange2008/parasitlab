<?php

namespace App\Http\Controllers\Labo;

use Illuminate\Support\Facades\Log;
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
 * + Les méthodes _index_ et _show_ ne sont pas implémentées.
 * Cela  n'a aucun sens d'afficher tous les prélèvements qui sont seulement affiché
 * avec la demande correspondantes.
 *
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
     * Fonction appelée quand on veut mettre des prélèvements dans une demande
     * sans prélèvement
     * Appelée par la vue resources/views/labo/demandeSansPrelevement.blade.php
     *
     * @param  Request $request demande_id , nb_prelevement
     * @return \Illuminate\View\View labo/prelevements/prelevementCreate
     */
    public function definitNbPrelev(Request $request)
    {
      $datas = $request->all();

      $demande = Demande::find($datas['demande_id']);
      $demande->nb_prelevement = intval($datas['nb_prelevement']);
      $demande->save();

      return redirect()->route('prelevement.create', $demande->id);
    }

    /**
     * Montre le formulaire pour renseigner TOUS les prélèvements d'une demande
     *
     * @return \Illuminate\View\View labo/prelevements/prelevementCreate
     */

    public function create($demande_id)
    {
      $demande = Demande::find($demande_id); // Recherche de l'analyse correspondant à l'espèce et à l'anaacte de la demande

      if ($demande->nb_prelevement > $demande->prelevements->count()) {

        $nb_prelevement_a_saisir = $demande->nb_prelevement;

      } elseif ($demande->nb_prelevement == $demande->prelevements->count()) {

        $nb_prelevement_a_saisir = 1;

      } else {

        Log::error("Problème de nombre dans la saisie de prélèvements: demande n°".$demande->id.'('.auth()->user()->name.')');
        $demande->nb_prelevement = $demande->prelevements->count();
        $demande->save();
        return redirect()->route('demandes.show', $demande->id)->with(['message' => 'pb_nb_prelevement', 'couleur' => 'alert-danger']);

      }

      $troupeau = Troupeau::find($demande->troupeau_id);

      $animals = Animal::where('troupeau_id', $troupeau->id)->get();

      $espece_id = $demande->espece->id;
      $typeprods = Typeprod::where('espece_id', $espece_id)->get();
      $anatype_id = $demande->anaacte->anatype->id;
      $analyse = Analyse::where(['espece_id' => $espece_id, 'anatype_id' => $anatype_id])->first();

      return view('labo.prelevements.prelevementCreate', [
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
        'nb_prelevement_a_saisir' => $nb_prelevement_a_saisir,
      ]);
    }
    /**
    * Enregistre les données de l'ensemble des prélèvements d'une demande
    * Appeler par la vue resources/views/labo/prelevements/prelevementCreate.blade.php
    * @param  \Illuminate\Http\Request  $request
    * @return Redirect DemandeController@show
    */
    public function store(Request $request)
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

      $nb_prelevement_a_saisir = intval($request->nb_prelevement_a_saisir);

      for($i = 1; $i <= $nb_prelevement_a_saisir; $i++ ) {

        // On crée un nouveau prélèvement et on y ajoute les paramètres simples
        $prelevement = new Prelevement;
        $prelevement->demande_id = $request->demande_id;
        $prelevement->analyse_id = $request->analyse_id;
        $prelevement->etat_id = $datas['etatPrelevement_'.$i];

        //Si c'est prélèvement individuel
        if ($datas['typeprelevement_'.$i] == 'indiv' ) {

          $estMelange = false;
          $numero = $datas['numeroAnimal_'.$i];
          $nom = $datas['nomAnimal_'.$i];

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

        $prelevement->parasite = $datas['parasite_'.$i];

        $prelevement->save();

        // On associe les signes de parasitismes cochés à ce nouveau prélèvement
        $prelevement->signes()->detach();

        if(array_key_exists('signe_'.$i, $datas))
        {

          $prelevement->signes()->attach($datas['signe_'.$i]);

        }



      }
      // On met à jour le nombre de prélèvement de la demande en fonction du nombre de prélèvement existants
      $demande->nb_prelevement = $demande->prelevements->count();
      $demande->save();

      return redirect()->route('demandes.show', $demande->id);

    }


    /**
    * Non implémenté car inutile
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
      $prelevement =Prelevement::find($id);

      session([
        'route_retour' => 'prelevement.edit',
        'prelevement_id' => $id,
      ]);

        return view('labo.prelevements.prelevementEdit', [
          'menu' => $this->menu,
          'prelevement' => $prelevement,
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
        $prelevement = Prelevement::find($id);

        $prelevement->etat_id = $request->etatPrelevement;
        $prelevement->parasite = $request->parasite;

        $prelevement->signes()->detach();
        // Il faut d'abord vérifier si des cases ont été cochées
        if (key_exists('signe', $request->all())) {

          $prelevement->signes()->attach($request->signe);

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
