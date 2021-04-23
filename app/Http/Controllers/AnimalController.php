<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\Animal;
use App\Models\Productions\Demande;
use App\Models\Productions\Prelevement;
use App\Models\Troupeau;
use App\User;

use App\Fournisseurs\ListeAnimalsFournisseur;
use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;
/**
 * Controleur qui gère l'objet Animal
 *
 * @see \App\Models\Animal
 *
 * @package Animaux
 */
class AnimalController extends Controller
{
    use LitJson, UserTypeOutil;

    protected $menu;

    /**
     * Constructeur qui remplit la variable $menu avec le tableau issu du json
     */
    public function __construct()
    {
      $this->menu = $this->litJson('menuLabo');
    }

    /**
     * NON IMPLEMENTE: affiche la liste des animaux
     *
     * Sans objet car, pour l'instant les animaux ont comme seule utilité de
     * renseigner le prélèvement
     */
    public function index()
    {
      $animals = Animal::all();

      $fournisseur = new ListeAnimalsFournisseur();

      $datas = $fournisseur->renvoieDatas($animals, __('titres.list_animals'), 'tout.svg', 'tableauAnimals', 'animal.create', __('boutons.add_animal'));

      return view('admin.animals', [
        'menu' => $this->menu,
        'datas' => $datas,
      ]);
    }

    /**
     * NON IMPLEMENTE: renvoie le formulaire pour créer un animal
     *
     * En fait cette fonction n'est pas implémenté car c'est pas la saisie d'un
     * prélèvement que l'on crée un nouvel animal.
     */
    public function create()
    {

        $usertype_eleveur = $this->userTypeEleveur();
        $eleveurs = User::where('usertype_id', $usertype_eleveur->id)
                          ->orderBy('name')
                          ->get();

        return view('admin.animals.animal_create', [
          'menu' => $this->menu,
          'eleveurs' => $eleveurs,
          'troupeaus' => Troupeau::all(),
  ]);
    }

    /**
     * Enregistre le nouvel animal créé
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Règle pour s'assurer qu'un élément au moins est remplit: numéro ou nom
        $validator = Validator::make($request->all(), [
          'numero' => 'required|alpha_num',
        ]);

        if ($validator->fails()) {
          return redirect()->back()->with([
            'message' => 'numero_nom_null',
            'couleur' => 'alert-danger',
          ]);
        } else {
          $datas = $request->all();

          $animal = new Animal;

          $animal->numero = $datas['numero'];

          $animal->nom = $datas['nom'];

          $animal->troupeau_id = $datas['troupeau_id'];

          $animal->save();

          return redirect()->back()->with('message', 'animal_add');
        }

    }

    /**
     * NON IMPLEMENTE: affiche l'animal car page unique show et edit
     *
     * @param  int  $id
     */
    public function show($id)
    {
        //
    }

    /**
     * NON IMPLEMENTE: renvoie un formulaire pour modifier un animal
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::find($id);

        $prelevements = Prelevement::where('animal_id', $id)->get();

        return view('admin.animals.animal_edit', [
          'menu' => $this->menu,
          'animal' => $animal,
          'prelevements' => $prelevements,
        ]);
    }

    /**
     * Met à jour un animal modifié
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id id de l'animal à mettre à jour
     */
    public function update(Request $request, $id)
    {
        $datas = $request->all();

        $animal = Animal::find($id);

        $animal->numero = $datas['numero'];

        $animal->nom = $datas['nom'];

        $animal->save();

        return redirect()->route('animal.index')->with('message', 'animal_update');

    }

    /**
     * Destiné à mettre à supprimer un animal
     *
     * @param  int  $id id de l'animal à détruire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Animal::destroy($id);

        return redirect()->route('animal.index')->with('message', 'animal_del');
    }
}
