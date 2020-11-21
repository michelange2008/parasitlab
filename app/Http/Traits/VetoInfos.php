<?php
namespace App\Http\Traits;

use App\Models\Productions\Demande;
use App\Models\Veto;

use App\Http\Traits\FormatNum;
/**
 *  FOURNIT DES INFOS SUR UN VETERINAIRE
 */
trait VetoInfos
{

  use FormatNum;

  public function vetoInfos($user)
  {
    $vetoInfos = collect();

    $vetoInfos->nbDemandes = Demande::where('tovetouser_id', $user->id)->count();

    $vetoInfos->listeDemandes = Demande::where('tovetouser_id', $user->id)->get();

    return $vetoInfos;
  }

  public function formatNumTelVeto($user)
  {

    $user->veto->num = $this->numAvecEspace($user->veto->num);

    $user->veto->tel = $this->telAvecEspace($user->veto->tel);

    return $user;

  }

}
