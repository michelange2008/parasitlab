<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Models\Analyses\Anaacte;
use App\Models\Analyses\Anatype;
use App\Models\Algorithme\Categorie;
use App\Models\Espece;
use App\Models\Age;
use App\Models\Veto;
use App\Models\Productions\Facture;
use App\Models\Productions\Demande;
use App\Models\Productions\Acte;
use App\Models\Productions\Anaacte_Facture;

use App\Http\Traits\FactureFactory;

/**
* Controlleur destiné à afaire des essais
*/
class DevController extends Controller
{
  use FactureFactory;

  //
  public function index() {

    $eleveurs = DB::table('users')->where('usertype_id', 1)
                  ->join('eleveurs', 'eleveurs.user_id', 'users.id')->select('cp')->get();

    foreach($eleveurs as $eleveur) {

    }

    dd($eleveurs);

  }

  // Calcul la somme des factures éleveurs sur une année précise
  public function factures() {

    $factures = Facture::where('faite_date', '>=', '2022-01-01')->get();
    // On procède au calcul de chaque facture
    foreach ($factures as $facture) {
      $somme_facture = $this->calculSommeFacture($facture);
      $facture->total_ht = $somme_facture->total_ht;
      $facture->total_ttc = $somme_facture->total_ttc;
    }
    $total = 0;
    foreach($factures as $facture) {

      if($facture->user->usertype->nom != "laboratoire") {

        $total += floatval($facture->total_ht);
      }


    }
    dd($total);

  }
  // Nombre de prélèvements analysés pour les éleveurs
  public function prelevements() {

    $prel = DB::table('prelevements')->join('demandes', 'demandes.id', 'prelevements.demande_id')
              ->where('demandes.date_reception', '<', '2023-01-01' )
              ->where('demandes.date_reception', '>=', '2022-01-01' )
              ->where('demandes.userfact_id', '<>', 0)
              ->count();

    dd($prel);

  }

}
