<?php

namespace App\Http\Controllers\Labo;

use App\Http\Controllers\Controller;
use App\Http\Traits\FactureFactory;
use App\Http\Traits\LitJson;
use App\Http\Traits\StatsBase;
use App\Models\Productions\Demande;
use App\Models\Productions\Facture;
use App\Models\Productions\Prelevement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Affichage du tableau de bord des utilisateurs Labo
 */
class AdminController extends Controller
{
    use LitJson, FactureFactory, StatsBase;
    /**
     * Affiche un tableau de bord pour les utilisateurs 
     * du groupe Labo
     * @return View dashboard.blade.php
     **/
    public function index()
    {
        $demandes_en_cours = Demande::where('acheve', 0)->orderBy('date_prelevement', 'DESC')->get();
        $demandes_non_signees = Demande::where('acheve', 1)->where('signe', 0)
        ->orderBy('date_prelevement', 'DESC')->get();
        $demandes_non_envoyees = Demande::where('acheve', 1)->where('signe', 1)
        ->where('envoye', 0)->orderBy('date_prelevement', 'DESC')->get();
        $prelevements = Prelevement::all();
        $factures_a_etablir = DB::table('demandes')->where('acheve', 1)->where('signe', 1)
        ->where('envoye', 1)->where('facturee', 0)
        ->join('users', 'users.id', 'demandes.user_id')
        ->join('anaactes', 'anaactes.id', 'demandes.anaacte_id')
        ->join('tvas', 'tvas.id', 'anaactes.tva_id')
        ->select('users.name as user_name', 'users.id as user_id', 'anaactes.nom as anaacte_nom', 
        'anaactes.pu_ht as pu_ht', 'tvas.taux as tva')
        ->get();
        $factures_a_etablir = $factures_a_etablir->groupBy('user_name');
        
        $factures_dues = Facture::where('payee', 0)->orderBy('faite_date', 'DESC')->get();
        foreach ($factures_dues as $facture) {
            $somme_facture = $this->calculSommeFacture($facture);
            $facture->total_ht = $somme_facture->total_ht;
            $facture->total_ttc = $somme_facture->total_ttc;
        }
        $statsBase = $this->renvoieStatsBase();

        $statsAnnuelles = $this->analysesAnnuelles();
        
        return view('admin.dashboard', [
            'menu' => $this->litJson('menuLabo'),
            'demandes_en_cours' => $demandes_en_cours,
            'demandes_non_signees' => $demandes_non_signees,
            'demandes_non_envoyees' => $demandes_non_envoyees,
            'factures_a_etablir' => $factures_a_etablir,
            'factures_dues' => $factures_dues,
            'prelevements' => $prelevements, // Destiné à compter le nombre de prélèvements pour une analyse en cours
            'statsBase' => $statsBase,
            'statsAnnuelles' => $statsAnnuelles,
        ]);
    }
}
