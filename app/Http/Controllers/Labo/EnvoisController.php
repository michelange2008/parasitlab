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

class EnvoisController
{

    use DemandeFactory, LitJson;


    // Fonction appelée par le bouton renvoyer de la page demandeShow
    // Pour envoyer les résultats à l'éleveur OU au vétérinaire selon le cas
    public function envoyerResultats($destinataire_id, $demande_id)
    {
      $demande = Demande::find($demande_id);

      $destinataire = User::find($destinataire_id);

      $this->envoie($destinataire->email, $demande);

    }

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

    // Fonction appelée par le bouton envoyer de la page demandeShow
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
      if($demande->toveto) {

        $veto = Veto::find($demande->veto_id);

        $this->envoie($veto->user->email, $demande);
      }


    }

    public function envoie($email, $demande)
    {

      $demande = $this->demandeFactory($demande);

      $mail = Mail::to($email)->send(new Resultats($demande));

    }


}
