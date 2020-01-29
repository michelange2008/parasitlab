<?php

namespace App\Http\Controllers\Labo;

use DB;
use Illuminate\Support\Facades\Mail;

use App\Mail\Resultats;

use App\Http\Traits\DemandeFactory;

use App\Models\Productions\Demande;
use App\User;

class EnvoisController
{

    use DemandeFactory;

    public function envoyerResultats($destinataire_id, $demande_id)
    {

      $demande = Demande::find($demande_id);

      $destinataire = User::find($destinataire_id);

      $demande = $this->demandeFactory($demande);

      $mail = Mail::to($destinataire->email)->send(new Resultats($demande));

      DB::table('demandes')->where('id', $demande_id)->update([
        'date_envoi' => \Carbon\Carbon::now(),
      ]);

    }

}
