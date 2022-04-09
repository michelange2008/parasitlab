<?php
namespace App\Http\Traits;

use App\Models\Productions\Demande;
use App\Models\Productions\Facture;
use App\Models\Productions\Acte;
use App\Models\Veto;
use App\Models\Analyses\Tva;
use App\Models\Productions\Anaacte_Facture;

use App\Http\Traits\Personne;
/**
 * Ensemble de méthodes permettant d'établir une facture
 */
trait FactureFactory
{
  use Personne;
  /**
  * Méthode pour la liste des users qui ont de demandes non facturées (manipulation due au fait que certaines demandes
  * d'analyses ne sont pas à facturer au propriétaire des animaux)
  *
  * return collection avec une liste d'id utilisateurs ayant chacun une liste de demande_id
  */
  function clientsDemandesAFacturer()
  {
    $demandes_non_facturees = Demande::select('id','user_id', 'tovetouser_id', 'userfact_id')
                              ->where('signe', true)
                              ->where('facturee', false)->get();

    // Manipulation pour associer au user_id le destinataire de la facture
    $udnf = Collect();

    foreach ($demandes_non_facturees as $demande_non_facturee) {

      $udnf->push(["user_id" => $demande_non_facturee->userfact_id, "demande_id" => $demande_non_facturee->id]);

    }

    $users_dnf = $udnf->mapToGroups(function ($item, $key) {

        return [$item['user_id'] => $item['demande_id']];

    });

    return $users_dnf;
  }

  /**
  * Methode identique mais pour les actes: c'est plus simple car le user de l'acte est aussi le destinataire de facture
  *
  * return: un tableau identique au précédent mais avec les acte_id au lieu des demande_id
  */

  public function clientsActesAFacturer()
  {
    $actes_non_factures = Acte::select('id','user_id')->where('facturee', false)->get();

    $uanf = Collect();

    foreach ($actes_non_factures as $acte_non_facture) {

      $uanf->push(["user_id" => $acte_non_facture->user_id, "acte_id" => $acte_non_facture->id]);

    }

    $users_anf = $uanf->mapToGroups(function ($item, $key) {
        return [$item['user_id'] => $item['acte_id']];
    });

    return $users_anf;
  }

  public function ajouteSommeEtTvasEtNum($facture)
  {
    $somme_facture = $this->calculSommeFacture($facture);

    $liste_tvas = $this->calculTvas($facture);

    $facture->somme_facture = $somme_facture;

    $facture->liste_tvas = $liste_tvas;

    $facture->num = config('laboInfos.prefixe_facture').$facture->id;

    return $facture;
  }

  public function CalculFactureHT($facture)
  {
    $total_facture_HT = 0;

    $anaactes_factures = Anaacte_Facture::where('facture_id', $facture->id)->get();

    foreach ($anaactes_factures as $anaacte_facture) {

      $total_facture_HT += floatval($anaacte_facture->pu_ht) * $anaacte_facture->nombre;

    }

    return $total_facture_HT;
  }

  public function calculSommeFacture($facture)
  {
    $somme_facture = Collect();

    $somme_facture->total_ht = 0;
    $somme_facture->total_ttc = 0;
    $total_ht = 0;
    $total_ttc = 0;
    $anaactes_factures = Anaacte_Facture::where('facture_id', $facture->id)->get();

    foreach ($anaactes_factures as $anaacte_facture) {

      $total_ht += floatval($anaacte_facture->pu_ht) * $anaacte_facture->nombre;

      $total_ttc += $anaacte_facture->pu_ht * $anaacte_facture->nombre * ( 1 + $anaacte_facture->tva->taux );

    }

    $somme_facture->total_ht = number_format($total_ht, 2, ",", " ")." €";

    $somme_facture->total_ttc = number_format($total_ttc, 2, ",", " ")." €";

    return $somme_facture;
  }

  public function calculTvas($facture)
  {
    $anaactes_factures = Anaacte_Facture::where('facture_id', $facture->id)->get();

    $tvas = Tva::all();

    $liste_tvas = [];

    foreach ($tvas as $tva) {

      $tvaReadable = strval($tva->taux * 100)." %";

      $liste_tvas[$tvaReadable] = 0;

      foreach ($anaactes_factures as $anaacte_facture) {

        if($anaacte_facture->tva_id == $tva->id) {

          $liste_tvas[$tvaReadable] += ($anaacte_facture->pu_ht * $anaacte_facture->nombre * $tva->taux);

        }

      }

      $liste_tvas[$tvaReadable] = number_format($liste_tvas[$tvaReadable], 2, ",", " ");

    }
    return $liste_tvas;
  }

  // Renvoie tous les éléments pour afficher une facture ou en faire un PDF
  public function prepareFacture($facture_id)
  {
    $elementDeFacture = Collect();
    // On cherche la facture
    $facture = Facture::findOrFail($facture_id);

    // Et on calcul son total
    $facture_completee = $this->ajouteSommeEtTvasEtNum($facture);
    // On récupère les actes facturés... Bon c'est pas tout à fait correct de faire une requête sur la table pivot
    // Mais contrairement aux autres tables, cette table pivot stocke de l'information au delà des id des actes et des factures
    // En effet, il est indispensable de mettre à chaque fois le montant de l'acte au cas où cette valeur change ultérieurement
    // (augmentation des tarifs ou changement du taux de tva)
    $anaactes_factures = Anaacte_Facture::where('facture_id', $facture_id)->get();
    // Ajout de l'user dans sans forme de soustype pour avoir son adresse et autres infos grâce à UserTypeOutil
    $personne = $this->personne($facture->user_id);

    $demandes = Demande::where('facture_id', $facture_id)->get();

    $elementDeFacture->facture = $facture_completee;
    $elementDeFacture->demandes = $demandes;
    $elementDeFacture->personne = $personne;
    $elementDeFacture->anaactes_factures = $anaactes_factures;

    // QUESTION: Pourquoi ces données en session ? C'est pour les récupérer quand on veut éditer une facture en pdf via le PdfController
    // session(['facture_completee'=> $facture_completee, 'demandes'=> $demandes, 'anaactes_factures' => $anaactes_factures]);

    return $elementDeFacture;
  }
}
