<?php

namespace App\Http\Controllers;

/*
* CONTROLLER DESTINE A RÉAIGUILLER UN LIEN VERS UNE VUE EN FONCTION DU TYPE D'UITLISATEUR (LABO, ELEVEUR, VETO)
*/

use Illuminate\Http\Request;
use App\Http\Traits\UserTypeOutil;

use App\Models\Productions\Demande;
use App\Models\Productions\Serie;

class RouteurController extends Controller
{
  use UserTypeOutil;

// METHODE QUI EST APPELLEE PAR LES LIENS DATE DE DEMANDE SUR LA VUE labo.serieShow.detailIdentique
  public function routeurDemande($demande_id)
  {

    $demande = Demande::find($demande_id);

    if($this->estLabo(auth()->user()->usertype_id)) {


      return redirect()->route('demandes.show',['id' => $demande_id]);

    }
    elseif ($this->estVeto(auth()->user()->usertype_id)) {

      return "coucou véto";
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

      return "coucou véto";
    }

    elseif ($this->estEleveur(auth()->user()->usertype_id)) {

      return redirect()->route('eleveur.serieShow', ['serie_id' => $serie_id]);
    }
    else {

      return "ya un probleme";

    }

  }

}
