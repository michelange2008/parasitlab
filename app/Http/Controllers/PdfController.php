<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Productions\Demande;
use App\Http\Traits\DemandeFactory;
use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;

class PdfController extends Controller
{
  use DemandeFactory, LitJson, UserTypeOutil;

  public function resultatPdf($demande_id)
  {
    $demande = Demande::find($demande_id);

    $demande = $this->demandeFactory($demande); // Trait DemandeFactory : ajoute attributs toutNegatif et nonDetecte aux prélèvements et met les dates à un format lisible

    if ($this->estEleveur(auth()->user()->usertype->id)) {

      $pdf = PDF::loadview('labo.resultats.pdf.eleveurPdf', compact('demande'));

    }
    elseif ($this->estVeto(auth()->user()->usertype->id)) {

      $pdf = PDF::loadview('labo.resultats.pdf.vetoPdf', compact('demande'));

    }

    elseif ($this->estLabo(auth()->user()->usertype->id)) {

      $pdf = PDF::loadview('labo.resultats.pdf.laboPdf', compact('demande'));

    }

    else {

      return route('accueil');

    }


    $name = $demande->user->name."_".$demande->anapack->nom."_".$demande->date_resultat.".pdf";

    return $pdf->stream($name);

    // return view('demande_pdf', [
    //   "demande" => $demande,
    // ]);

  }

  public function attachPdf($demande_id)
  {
    $demande = Demande::find($demande_id);

    $demande = $this->demandeFactory($demande); // Trait DemandeFactory : ajoute attributs toutNegatif et nonDetecte aux prélèvements et met les dates à un format lisible

    $pdf = PDF::loadview('labo.resultats.pdf', compact('demande'));

    return $pdf;
  }

}
