<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Analyses\Anatype;
use App\Models\Analyses\Anaacte;
use App\Models\Espece;

use App\Http\Traits\LitJson;

/**
* Controleur destiné à afficher la page d'accueil
*
* Controleur destiné à afficher la page d'accueil et les pages de présentation
* de parasitlab pour les vétérinaires, les éleveurs et les propriétaires de chevaux.
*
* @package Public
*/
class AccueilController extends Controller
{

    use LitJson;

    /**
     * Tableau avec les éléments du menu en accès public
     * @var array
     */
    protected $menu;

    /**
     * Constructeur qui remplit la variable $menu avec le tableau issu du json
     */
    public function __construct()
    {
      $this->menu = $this->litJson('menuExtranet');
    }

    /**
     * Page d'accueil du site
     *
     * @link https://parasitlab.org
     * @return \Illuminate\View\View extranet\accueil
     */
    public function index()
    {
/**
 * TODO mettre le prix du kit dans le texte en tant que variable et non en dur
 * dans le fichier enpratiqueEnvoi.php
 */
      return view('extranet.accueil', [
        'menu' => $this->menu, //éléments du menu pour l'accès public
        'accueilEntetes' => $this->litJson('accueilEntetes'), // éléments pour les cartouches et la présentation
        'carousel' => $this->litJson('carousel'), // éléments pour le carrousel de la page d'accueil (photos, texte)
        'resultats_rapides' => $this->litJson('resultats_rapides'),// éléments pour la partie basse de la page d'accueil
      ]);
    }

    /**
     * Page d'accueil destinée aux vétérinaires
     *
     * @link https://parasitlab.org/veterinaires
     * @return \Illuminate\View\View extranet\veterinaires
     */
    public function veterinaires()
    {
      return view('extranet.veterinaires', [
        "menu" => $this->menu,
        "contenu" => $this->litJson('veterinaires'), // Contenu de la page
        "anatypes" => Anatype::all(), // Liste des anatypes
      ]);
    }

    /**
     * Page d'accueil pour les éleveurs
     * @link https://parasitlab.org/eleveurs
     * @return \Illuminate\View\View extranet\eleveurs
     */
    public function eleveurs()
    {
      return view('extranet.eleveurs', [
        "menu" => $this->menu,
        'elements' => $this->LitJson('eleveurs'), // texte et photos pour éleveurs
      ]);
    }

    /**
     * Page d'accueil pour les cavaliers
     * @link https://parasitlab.org/cavaliers
     * @return \Illuminate\View\View extranet\cavaliers
     */
    public function cavaliers()
    {
      return view('extranet.cavaliers', [
        "menu" => $this->menu,
        "contenu" => $this->litJson('cavaliers'), // texte et images pour les cavaliers
      ]);
    }


}
