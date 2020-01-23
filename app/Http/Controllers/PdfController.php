<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Productions\Demande;
use App\Http\Traits\DemandeFactory;

class PdfController extends Controller
{
  use DemandeFactory;

  public function resultatPdf($id_demande)
  {
    $demande = Demande::find($id_demande);

    $demande = $this->demandeFactory($demande); // Trait DemandeFactory : ajoute attributs toutNegatif et nonDetecte aux prélèvements et met les dates à un format lisible

    $pdf = PDF::loadview('labo.resultats.pdf', compact('demande'));

    $name = $demande->user->name."_".$demande->anapack->nom."_".$demande->date_resultat.".pdf";

    return $pdf->stream($name);

    // return view('demande_pdf', [
    //   "demande" => $demande,
    // ]);

  }

}
