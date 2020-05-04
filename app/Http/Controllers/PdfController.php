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

  public function resultatsPdfEleveur($demande_id)
  {
    $user = Demande::findOrFail($demande_id)->user;

    $this->authorize('view', $user);

    return $this->preparePdfResultats($demande_id, 'eleveurPdf');

  }

  public function resultatsPdfVeto($demande_id)
  {

    return $this->preparePdfResultats($demande_id, 'vetoPdf');

  }

  public function resultatsPdfLabo($demande_id)
  {

    return $this->preparePdfResultats($demande_id, 'laboPdf');

  }

  public function preparePdfResultats($demande_id, $vue)
  {
    $demande = Demande::find($demande_id);

    $demande = $this->demandeFactory($demande); // Trait DemandeFactory : ajoute attributs toutNegatif et nonDetecte aux prélèvements et met les dates à un format lisible

    $laboInfos = config('laboInfos');

    $pdf = PDF::loadview('labo.resultats.pdf.'.$vue, compact('demande', 'laboInfos'));

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

    $laboInfos = config('laboInfos');

    $pdf = PDF::loadview('labo.factures.pdf.facturePDF', compact('elementDeFacture', 'laboInfos'));

    return $pdf->stream('facture.pdf');
  }

  public function attachPdfFacture($facture_id)
  {
    // utilisation de la fonction elementDeFacture du trait FactureFactory
    $elementDeFacture = $this->prepareFacture($facture_id);

    $laboInfos = config('laboInfos');

    $pdf = PDF::loadview('labo.factures.pdf.facturePDF', compact('elementDeFacture', 'laboInfos'));

    return $pdf;
  }

}
