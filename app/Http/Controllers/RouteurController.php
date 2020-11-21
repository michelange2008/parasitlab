<?php

namespace App\Http\Controllers;

/*
* CONTROLLER DESTINE A RÉAIGUILLER UN LIEN VERS UNE VUE EN FONCTION DU TYPE D'UITLISATEUR (LABO, ELEVEUR, VETO)
*/
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

class RouteurController extends Controller
{

  use UserTypeOutil;
  use LitJson;

  protected $menu;
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function __construct()
  {
    $this->menu = $this->litJson("menuLabo");
  }

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



// METHODE QUI EST APPELLEE PAR LES LIENS DATE DE DEMANDE SUR LA VUE labo.serieShow.detailIdentique
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

  public function routeurSerie($serie_id)
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

  public function deletemoi($id)
  {

    return view('utilisateurs.deletemoi', [
      'menu' => $this->menu,
      'user' => User::find($id),
    ]);
  }

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
