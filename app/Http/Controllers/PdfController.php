<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Http\Controllers\Labo\EnvoisController;

use App\Models\Productions\Demande;
use App\Models\Productions\Prelevement;
use App\Models\Productions\Facture;
use App\Models\Analyses\Anatype;
use App\Models\Espece;
use App\User;

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
/* TODO: arranger cette merde de codage en dur du nom du signataire */
    $signataire = User::where('email', "michel.bouy@fibl.org")->first();

    $pdf = PDF::loadview('labo.resultats.pdf.'.$vue, compact('demande', 'signataire'));

    $name = $demande->user->name."_".$demande->anaacte->anatype->nom."_".$demande->date_resultat.".pdf";

    return $pdf->stream($name);
  }


  public function attachPdfResultats($demande_id)
  {
    $demande = Demande::find($demande_id);
    
    $signataire = User::where('email', "michel.bouy@fibl.org")->first();

    $demande = $this->demandeFactory($demande); // Trait DemandeFactory : ajoute attributs toutNegatif et nonDetecte aux prélèvements et met les dates à un format lisible

    $pdf = PDF::loadview('labo.resultats.pdf.eleveurPdf', compact('demande', 'signataire'));

    return $pdf;
  }

  public function presentation()
  {
    // code...
  }
  // Affiche la facture en pdf
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
  // Fonction qui produit une fiche vierge de paillasse avec les infos correspondant à une demande d'analyse
  public function fichePaillasse($demande_id)
  {
    // Pour récupérer les infos sur la demande d'analyse (sans faire du code tordu avec les prélèvements)
    $demande = Demande::find($demande_id);
    // Pour récupérer la liste des animaux
    $prelevements = Prelevement::where('demande_id', $demande_id)->get();
    // Liste des anaitems pour pouvoir construire la liste des parasites
    $anaitems = $demande->anaacte->anatype->analyses->where('espece_id', $demande->espece_id)->first()->anaitems;
    // On construit le pdf
    $pdf = PDF::loadview('labo.paillasse.paillassePDF', compact('prelevements', 'demande', 'anaitems'));

    return $pdf->stream('paillasse.pdf');
  }

}
