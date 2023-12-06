<?php

namespace App\Http\Traits;

use App\Models\Eleveur;
use App\Models\Productions\Demande;
use App\Models\Productions\Facture;
use App\Models\Productions\Prelevement;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\UserTypeOutil;

/**
 * Produit les statistiques de base de parasitlab
 * 
 * Nombre d'utilisateurs, de demandes d'analyses, d'analyses faites, de factures, ...
 */
trait StatsBase
{

    use LitJson, FactureFactory, UserTypeOutil;

    /**
     * Renvoie les statistiques de base
     *
     * @return object $statsBase
     **/
    public function renvoieStatsBase(): object
    {
        $statsBase = $this->litJson('statsBase');
        // On compte le nombre de demandes faites en prestations (l'utilisateur
        // facturé n'est pas le labo)
        $statsBase->nb_demandes->count = Demande::where('userfact_id', '<>', 0)->count();
        // Idem avec les prélèvements ce qui donne le nombre d'analyses réalisées
        $statsBase->nb_prelevements->count = DB::table('prelevements')
        ->join('demandes', 'demandes.id', '=', 'prelevements.demande_id')
        ->where('demandes.userfact_id', '<>', 0)->count();
        // On compte le nombre d'éleveurs dans la base de donnée
        $statsBase->nb_eleveurs->count = Eleveur::count();
        // On compte le total des montants facturés
        $factures = Facture::where('user_id', '<>', 0)->get();
        
        $total_factures = $this->facturesExtTotales();
        
        $total_factures = number_format($total_factures, 2, ",", " ") . " €";
        
        $statsBase->total_factures->count = $total_factures;
        
        $statsBase->analyses_internes->count = $this->analysesInternes();
        
        return $statsBase;
    }

      /**
  * Calcul la somme des factures faites autre qu'au laboratoire.
  *
  * @return float $total: somme des factures faites autre qu'au laboratoire
  */
  public function facturesExtTotales() : float
  {
    $factures = Facture::where('user_id', '<>', 0)->get();
    // On procède au calcul de chaque facture
    foreach ($factures as $facture) {
      $somme_facture = $this->calculSommeFacture($facture);
      $facture->total_ht = $somme_facture->total_ht;
      $facture->total_ttc = $somme_facture->total_ttc;
    }
    $total = 0;
    foreach($factures as $facture) {
        $total += floatval($facture->total_ht);
    }

    return $total;
  }

  /**
   * Renvoie le nombre d'analyses réalisées (prélèvements)
   *
   * par années pour faire un histogramme
   *
   * @return array $analyses_par_an
   **/
  public function analysesAnnuelles(): array
  {
    $users_ext = User::where('usertype_id', '<>', 2)->pluck('id');
    $demandes_ext = Demande::whereIn('userfact_id', $users_ext)->pluck('id');

    $prelevements = Prelevement::selectRaw('year(created_at) year, count(*) data')
    ->groupBy('year')
    ->orderBy('year', 'asc')
    ->whereIn('demande_id', $demandes_ext)
    ->get();
    $analyses_par_an = [];
    foreach ($prelevements as $annee) {
      $analyses_par_an['years'][] = $annee->year;
      $analyses_par_an['analyses'][] = $annee->data;
    }
    
    return $analyses_par_an;

  }

  /**
   * Nombre d'analyses réalisées en interne
   *
   * @return int $analysesInternes Nombre d'analyses totales réalisées en interne
   **/
  public function analysesInternes()
  {
    $laboratoire_id = $this->userTypeLabo()->id;
    $analysesInternes = Demande::where('userfact_id', $laboratoire_id)->count();

    return $analysesInternes;
  }

}
