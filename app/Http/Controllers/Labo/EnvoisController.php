<?php

namespace App\Http\Controllers\Labo;

use DB;
use PDF;
use Illuminate\Support\Facades\Mail;

use App\Mail\Resultats;
use App\Mail\EmailDemande;

use App\Http\Traits\DemandeFactory;
use App\Http\Traits\LitJson;

use App\Models\Productions\Demande;
use App\User;

class EnvoisController
{

    use DemandeFactory, LitJson;


    public function envoyerResultats($destinataire_id, $demande_id)
    {
      $demande = Demande::find($demande_id);

      $destinataire = User::find($destinataire_id);

      $demande = $this->demandeFactory($demande);

      $mail = Mail::to($destinataire->email)->send(new Resultats($demande));

      dd($mail);
      $db = DB::table('demandes')->where('id', $demande_id)->update([
        'date_envoi' => \Carbon\Carbon::now(),
      ]);
      return $mail;
    }
}
