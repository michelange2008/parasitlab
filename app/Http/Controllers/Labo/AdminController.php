<?php

namespace App\Http\Controllers\Labo;

use App\Http\Controllers\Controller;
use App\Http\Traits\LitJson;
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
    use LitJson;
    /**
     * Affiche un tableau de bord pour les utilisateurs 
     * du groupe Labo
     * @return View dashboard.blade.php
     **/
    public function index()
    {
        $demandes_en_cours = Demande::where('acheve', 0)->orderBy('date_prelevement', 'DESC')->get();
        $prelevements = Prelevement::all();
        $factures_a_etablir = DB::table('demandes')->where('facturee', 0)
                                ->join('users', 'users.id', 'demandes.user_id')
                                ->join('anaactes', 'anaactes.id', 'demandes.anaacte_id')
                                ->join('tvas', 'tvas.id', 'anaactes.tva_id')
                                ->select('users.name as user_name', 'users.id as user_id', 'anaactes.nom as anaacte_nom', 
                                'anaactes.pu_ht as pu_ht', 'tvas.taux as tva')
                                ->get();
        $factures_a_etablir = $factures_a_etablir->groupBy('user_name');
        $factures_dues = Facture::where('payee', 0)->orderBy('faite_date', 'DESC')->get();

        return view('admin.dashboard', [
            'menu' => $this->litJson('menuLabo'),
            'demandes_en_cours' => $demandes_en_cours,
            'factures_a_etablir' => $factures_a_etablir,
            'factures_dues' => $factures_dues,
            'prelevements' => $prelevements,
        ]);
    }
}
