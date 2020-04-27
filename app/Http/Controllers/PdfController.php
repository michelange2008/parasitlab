<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Http\Controllers\Labo\EnvoisController;

use App\Models\Productions\Demande;
use App\Models\Productions\Facture;
use App\Models\Analyses\Anatype;
use App\Models\Espece;

use App\Http\Traits\DemandeFactory;
use App\Http\Traits\FactureFactory;
use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;

class PdfController extends Controller
{
  use DemandeFactory, LitJson, UserTypeOutil, FactureFactory;

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


    $name = $demande->user->name."_".$demande->anaacte->anatype->nom."_".$demande->date_resultat.".pdf";

    return $pdf->stream($name);

  }

  public function attachPdfResultats($demande_id)
  {
    $demande = Demande::find($demande_id);

    $demande = $this->demandeFactory($demande); // Trait DemandeFactory : ajoute attributs toutNegatif et nonDetecte aux prélèvements et met les dates à un format lisible

    $pdf = PDF::loadview('labo.resultats.pdf.eleveurPdf', compact('demande'));

    return $pdf;
  }

  public function presentation()
  {
    // code...
  }

  public function facture($facture_id)
  {
    // utilisation de la fonction elementDeFacture du trait FactureFactory
    $elementDeFacture = $this->prepareFacture($facture_id);

    $pdf = PDF::loadview('labo.factures.pdf.facturePDF', compact('elementDeFacture'));

    return $pdf->stream('facture.pdf');
  }

  public function attachPdfFacture($facture_id)
  {
    // utilisation de la fonction elementDeFacture du trait FactureFactory
    $elementDeFacture = $this->prepareFacture($facture_id);

    $pdf = PDF::loadview('labo.factures.pdf.facturePDF', compact('elementDeFacture'));

    return $pdf;
  }

}
