<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Traits\UserTypeOutil;
use App\Http\Traits\LitJson;

use App\Models\Productions\Demande;
use App\Models\Productions\Facture;
use App\Models\Productions\Serie;
use App\User;
use App\Models\Eleveur;
use App\Models\Veterinaire;

/**
* Controleur destiné à réaiguiller vers un controleur ou une route spécifique en
* fonction du type d'utilisateur: Labo, Veto, Eleveur.
*
* @package Utilisateurs
*/
class RouteurController extends Controller
{

  use UserTypeOutil;
  use LitJson;

  /**
   * @var array
   */
  protected $menu;
  /**
   * Peuple le menu
   *
   * @return \Illuminate\Http\Response
   */
  public function __construct()
  {
    $this->menu = $this->litJson("menuLabo");
  }

  /**
   * Renvoi à un controleur différent selon le type d'User authentifié
   *
   * Correspond à la route __/personnel__
   * Renvoi aux routes __/laboratoire__ ou __/veterinaire__ ou __/eleveur__
   *
   * SI aucune User authentifié, renvoie à la page de connexion
   *
   * @return redirect route
   */
  public function routeurPersonnel()
  {

    if($this->estLabo(auth()->user()->usertype_id)) {

      return redirect()->route('laboratoire');

    }
    elseif ($this->estVeto(auth()->user()->usertype_id)) {

      return redirect()->route('veterinaire');

    }

    elseif ($this->estEleveur(auth()->user()->usertype_id)) {

      return redirect()->route('eleveur');
    }
    else {

      return redirect($to = null, $status = 418, $headers = [], $secure = null );

    }
  }



/**
* Méthode qui reroute vers une vue demandeShow différente en fonction du type d'User
*
* Correspond à la route /routeur/demande/{demande_id}
*
* @return \Illuminate\View\View xxx.demandeShow ou demandes.show selon le type d'User
*
*/
  public function routeurDemande($demande_id)
  {

    $demande = Demande::find($demande_id);

    if($this->estLabo(auth()->user()->usertype_id)) {


      return redirect()->route('demandes.show',['demande' => $demande_id]);

    }
    elseif ($this->estVeto(auth()->user()->usertype_id)) {

      return redirect()->route('veto.demandeShow', ['demande_id' => $demande_id]);

    }

    elseif ($this->estEleveur(auth()->user()->usertype_id)) {

      return redirect()->route('eleveur.demandeShow', ['demande_id' => $demande_id]);
    }
    else {

      return "ya un probleme";

    }

  }

  /**
  * Méthode qui reroute vers une vue serieShow différente en fonction du type d'User
  *
  * Correspond à la route /routeur/serie/{serie_id}
  *
  * @return \Illuminate\View\View xxx.serieShow ou serie.show selon le type d'User
  *
  */  public function routeurSerie($serie_id)
  {

    $serie = Serie::find($serie_id);


    if($this->estLabo(auth()->user()->usertype_id)) {


      return redirect()->route('serie.show',['serie' => $serie_id]);

    }
    elseif ($this->estVeto(auth()->user()->usertype_id)) {

      return redirect()->route('veto.serieShow', ['serie_id' => $serie_id]);

    }

    elseif ($this->estEleveur(auth()->user()->usertype_id)) {

      return redirect()->route('eleveur.serieShow', ['serie_id' => $serie_id]);
    }
    else {

      return "ya un probleme";

    }

  }

  /**
  * Méthode qui reroute vers le fichier pdf de la facture correspondant à l'id sous les conditions
  * suivantes:
  * + Soit l'User est Labo et la rédirection ne pose pas de problème
  * + Soit l'User n'est pas Labo. Il faut rechercher la facture correspondante à
  * l'id puis vérifier que l'User authentifier est destinataire de cette facture
  * et dans ce cas on peu l'afficher.
  *
  * Sinon retour vers l'accueil.
  *
  * Correspond à la route /facturePdf/{id}
  *
  * @param int id de la facture
  * @return \Illuminate\View\View facture.pdf ou accueil
  *
  */
  public function routeurFacturePdf($facture_id)
  {
    if($this->estLabo(auth()->user()->usertype_id)) {

      return redirect()->route('facture.pdf', $facture_id);

    }

    else {

      $facture = Facture::find($facture_id);

      if(auth()->user()->id == $facture->user_id) {

        return redirect()->route('facture.pdf', $facture_id);

      }

    }

    return redirect()->route('accueil');
  }

  /**
   * Renvoie vers un fichier pdf de résultats d'analyses différente selon le type d'User
   * authentifié.
   *
   * Il s'agit d ela route resultatsPdf/{id}
   *
   * TODO: ajouter la condition que l'User authentifier est bien destinataire des résultats
   *
   * @param  int $demande_id id de la demande d'analyse
   * @return \Illuminate\View\View resultatsPdf.xxx (selon User)
   */
  public function routeurResultatsPdf($demande_id)
  {

    if($this->estLabo(auth()->user()->usertype_id)) {

      return redirect()->route('resultatspdf.labo', $demande_id);

    }

    elseif ($this->estEleveur(auth()->user()->usertype_id)) {

      return redirect()->route('resultatspdf.eleveur', $demande_id);
    }

    elseif ($this->estVeto(auth()->user()->usertype_id)) {

      return redirect()->route('resultatspdf.veto', $demande_id);

    }

    else {
      return redirect('/accueil');

    }

  }

  /**
   * Méthode pour afficher la page de confirmation d'autodestruction d'un compte perso
   * @param  int $id Id de l'User
   * @return \Illuminate\View\View     utilisateurs.deletemoi Page qui affiche la demande de confirmation
   * de suppression de l'utilisateur avec un formulaire qui renvoie à __jemedelete()__
   */
  public function deletemoi($id)
  {

    return view('utilisateurs.deletemoi', [
      'menu' => $this->menu,
      'user' => User::find($id),
    ]);
  }

  /**
   * Méthode pour qu'un utilisateur puisse s'autosupprimer
   *
   * Appelée par la vue _utilisateurs.deletemoi_
   *
   * En fait, ça ne supprime pas l'utilisateur, ça ne fait que l'anonymiser pour
   * que le laboratoire ne perde pas les résultats d'analyses?
   *
   * TODO: comment on fait avec l'email
   *
   * @param  int $id Id de l'User
   * @return \Illuminate\View\View\ accueil
   */
  public function jemedelete($id)
  {
    $user = User::find($id);

    $user->name = "A supprimer";
    $user->password = bcrypt('suppression');

    if($this->estEleveur($user->usertype_id)) {

      $user_detail = Eleveur::where('user_id', $user->id)->first();

      $user_detail->veto_id = null;

    } elseif ($this->estVeto($user->usertype_id)) {

      $user_detail = Veterinaire::where('user_id', $user->id)->first();

    } else {

      dd('ça couille');

    }

    $user_detail->address_1 = "";
    $user_detail->address_2 = "";
    $user_detail->cp = "";
    $user_detail->commune = "";
    $user_detail->tel ="";
    $user_detail->num = "";

    $user_detail->save();
    $user->save();

    Auth::logout();

    return redirect()->route('accueil');
  }

}
