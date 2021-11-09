<?php

namespace App\Http\Controllers\Labo;

use DB;
use PDF;
use Illuminate\Support\Facades\Mail;

use App\Mail\Resultats;
use App\Mail\MailFacture;
use App\Mail\EmailDemande;

use App\Http\Traits\DemandeFactory;
use App\Http\Traits\LitJson;

use App\Models\Productions\Demande;
use App\Models\Productions\Facture;
use App\Models\Veto;
use App\User;

/**
 * Contrôleur destiné à gérer l'envoi des mails de résultats et de factures
 *
 * Une méthode commune _envoie(email, demande)_ et utilisée par 2 autres méthodes.
 *
 * @package Productions
 */
class EnvoisController
{

    use DemandeFactory, LitJson;


    /**
     * Fonction appelée par le bouton renvoyer de la page demandeShow
     * Pour envoyer les résultats à l'éleveur OU au vétérinaire selon le cas
     * @param  int $destinataire_id Id de l'User destinataire du mail
     * @param  int $demande_id      id de la demande d'analyse
     * @return void
     */
    public function envoyerResultats($destinataire_id, $demande_id)
    {
      $demande = Demande::find($demande_id);

      $destinataire = User::find($destinataire_id);

      $this->envoie($destinataire->email, $demande);

    }

    /**
     * Méthode destinée à envoyer une facture à son destinataire
     *
     * @param  int $facture_id Id de la facture
     * @return redirect FactureController@index
     */
    public function envoyerFacture($facture_id)
    {
      $facture = Facture::find($facture_id);

      $email = $facture->user->email;

      $mail = Mail::to($email)->send(new MailFacture($facture));

      DB::table('factures')->where('id', $facture_id)->update([

        'envoyee_date' => \Carbon\Carbon::now(),
        'envoyee' => true,

      ]);

      return redirect()->route('factures.index')->with('message', 'facture_envoyee');
    }

    /**
     * Méthode pour envoyer les résultats à l'éleveur et au vétérinaire si demandé
     * @param  int $destinataire_id Id du destinataire du mail avec les résultats
     * @param  int $demande_id Id de la demande
     * @return void
     */
    // Pour envoyer les résultats à l'éleveur et au vétérinaire si demandé
    public function envoyerResultatsTous($destinataire_id, $demande_id)
    {
      $demande = Demande::find($demande_id);
      // On envoie d'abord les résultats à l'éleveur
      $destinataire = User::find($destinataire_id);

      $this->envoie($destinataire->email, $demande);

      //et on note dans la bdd que les résultats on été envoyés
      DB::table('demandes')->where('id', $demande_id)->update([

        'date_envoi' => \Carbon\Carbon::now(),
        'envoye' => true,

      ]);

      // Puis on envoie éventuellement les résultats au véto
      if($demande->tovetouser_id != null) {

        $veto = Veto::find($demande->tovetouser_id);

        $this->envoie($veto->user->email, $demande);
      }

    }

    /**
     * Méthode générique pour les envois des résultats d'analyse
     * @param  email $email   [description]
     * @param  \App\Models\Productions\Demande $demande Demande d'analyse
     * @return void
     */
    public function envoie($email, $demande)
    {

      $demande = $this->demandeFactory($demande);

      $mail = Mail::to($email)->send(new Resultats($demande));

    }


}
