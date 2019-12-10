<?php
namespace App\Http\Traits;

use App\Models\Veto;

use App\Http\Traits\LitJson;
use App\Http\Traits\FormatTel;

/**
 * FOURNIT LA LISTE DES VETOS AVEC TOUTES LES INFOS NECESSAIRES FORMATTEES POUR LES AFFICHER DANS INDEX
 */
trait ListeVetosFournisseur
{
  function tableau()
  {

    $vetos = Veto::all();

    $tableau = collect();

    $tableau->titre = 'liste des vétérinaires';

    $tableau->userType = $vetos[0]->user->userType;

    $tableau->intitules = $this->litJson('tableauVetos');

    $tableau->liste = $this->liste($vetos);

    return $tableau;

  }

  public function liste($vetos)
  {
    $liste = collect();

    foreach ($vetos as $veto) {
      $description = [];

      $nom = collect();
      $nom->action = 'lien';
      $nom->id = $veto->user->id;
      $nom->nom = $veto->user->name;
      $nom->route = 'eleveurAdmin.show';

      $email = collect();
      $email->action = '';
      $email->nom = $veto->user->email;

      $cro = collect();
      $cro->action = '';
      $cro->nom = $veto->cro;

      $cp = collect();
      $cp->action = '';
      $cp->nom = $veto->cp;

      $tel = collect();
      $tel->action = '';
      $tel->nom =  $this->ajouteEspaceTel($veto->tel);

      $suppr = collect();
      $suppr->id = $veto->veto->user->id;
      $suppr->action = 'del';
      $suppr->route = 'vetoAdmin.destroy';

      $description = [
        $nom,
        $email,
        $cro,
        $cp,
        $tel,
        $suppr,
      ];

      $liste->put($veto->id , $description);

    }

    return $liste;
  }
}
