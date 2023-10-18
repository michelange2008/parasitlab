<?php

namespace App\Http\Controllers\Labo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Models\Analyses\Anaacte;
use App\Models\Productions\Acte;

use App\Fournisseurs\ListeActesFournisseur;

use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;

/**
 * Contrôleur de la classe Acte: prestation (cad Anaacte) mais qui n'est pas une analyse
 * et qui est attribuée à un User
 *
 * C'est un contrôleur CRUD sans méthode show, edit et update.
 *
 * @example Quand on envoie un kit de prélèvement à un éleveur, on crée l'acte correspondant
 * à son nom.
 *
 * @package Productions
 */
class ActeController extends Controller
{
    use LitJson, UserTypeOutil;

    /**
     * @var array
     */
    protected $menu;

    /**
     * Constructeur pour passer les middleware auth et labo et peupler le menu
     */
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('labo');

      $this->menu = $this->litJson('menuLabo');

    }

    /**
     * Liste des actes attribués à des User
     *
     * @return \Illuminate\View\View labo/actes
     */
    public function index()
    {
        $actes = Acte::all();

        $fournisseur = new ListeActesFournisseur();

        $datas = $fournisseur->renvoieDatas($actes, __('titres.list_actes'), 'acte.svg', 'tableauActes', 'acte.create', __('boutons.add_acte'));

        return view('labo.actes', [
          'menu' => $this->menu,
          'datas' => $datas,
        ]);

    }

    /**
     * Liste des actes d'un user
     *
     * @param User $user utilisateur dont on veut voir les actes
     * @return View affichage de la liste des actes
     **/
    public function indexActesUser(User $user)
    {
      $actes = Acte::where('user_id', $user->id)->get();

      $fournisseur = new ListeActesFournisseur();

      $datas = $fournisseur->renvoieDatas($actes, __('titres.list_actes'), 'acte.svg', 'tableauActes', 'acte.create', __('boutons.add_acte'));

      return view('labo.actes', [
        'menu' => $this->menu,
        'datas' => $datas,
      ]);

  }

    /**
     * Affiche un formulaire pour attirbuer un Anaacte à un User
     *
     * @return \Illuminate\View\View labo/actes/acteCreate
     */
    public function create()
    {
        $estLabo = $this->userTypeLabo();

        $users = User::where('usertype_id', '<>', $estLabo->id)
                ->orderBy('name')
                ->get();

        $anaactes = Anaacte::where('estAnalyse', false)->get();

        return view('labo.actes.acteCreate', [
          'menu' => $this->menu,
          'users' => $users,
          'anaactes' => $anaactes,
        ]);
    }

    /**
     * Enregistre le nouvel acte attribué à un User
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Redirect ActeController@index
     */
    public function store(Request $request)
    {
      $datas = $request->all();

      foreach ($datas as $clef => $data) {

        if(explode('_', $clef)[0] == 'anaacte') {

          if ($data > 0) {

            $acte = new Acte();
            $acte->user_id = $datas['user_id'];
            $acte->anaacte_id = explode('_', $clef)[1];
            $acte->nombre = $data;

            $acte->save();

          }

        }

      }

      return redirect()->route('acte.index')->with('message', 'create_new_acte');

    }

    /**
     * Non implémenté
     */
    public function show($id)
    {
        //
    }

    /**
     * Non implémenté
     */
    public function edit($id)
    {
        //
    }

    /**
     * Non implémenté
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Supprime l'acte associé à un User
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Acte::destroy($id);

        return redirect()->route('acte.index');
    }

      /**
   * Ajoute un acte à un utilisateur 
   *
   * @param User $user utilisateur pour lequel ajouter un acte
   * @return view labo.addActeToUserCreate
   **/
  public function addActeToUser(User $user)
  {
    $actes = Anaacte::where('estAnalyse', 0)->get();

    return view('labo.addActeToUserCreate', [
      'menu' => $this->menu,
      'actes' => $actes,
      'user' => $user,
    ]);
  }

  /**
   * Enregistre l'acte ajouté à l'user
   *
   * @param Request $request, 
   * @param User $user,
   * @return view
   **/
  public function storeActeToUser(Request $request, User $user)
  {
    $datas = $request->all();
    $nb_acte = 0;
    foreach ($datas as $acte => $quantite) {
      if(explode('_', $acte)[0] == 'acte') {
        $anaacte = Anaacte::find(explode('_', $acte)[1]);
        $acte = new Acte();
        $acte->user_id = $user->id;
        $acte->anaacte_id = $anaacte->id;
        $acte->nombre = $quantite;
        $acte->facturee = 0;
        $acte->facture_id = null;
        $acte->save();
        $nb_acte += $quantite;
      }
    }
    return redirect()->route('eleveurAdmin.show', $user->id)->with('message', 'acte_added');
  }
}
