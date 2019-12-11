<?php
namespace App\Http\Traits;

use App\Models\Veto;

use App\Http\Traits\LitJson;
use App\Http\Traits\FormatTel;
use App\Http\Traits\ListeItemFactory;

/**
 * FOURNIT LA LISTE DES VETOS AVEC TOUTES LES INFOS NECESSAIRES FORMATTEES POUR LES AFFICHER DANS INDEX
 */
trait ListeVetosFournisseur
{

  use FormatTel, LitJson, ListeItemFactory;

  protected $datas;

  protected $liste;

  function datas()
  {

    // $vetos = Veto::where('id', '<>', 1)->get();
    $vetos = Veto::all();

    $this->datas = collect();

    $this->datas->titre = 'liste des vétérinaires';

    $this->datas->icone = $vetos[0]->user->userType->icone;

    $this->datas->intitules = $this->litJson('tableauVetos');

    $this->datas->liste = $this->liste($vetos);

    return $this->datas;

  }

  public function liste($vetos)
  {
    $this->liste = collect();

    foreach ($vetos as $veto) {

      $description = [];
      // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)
      $nom = $this->itemFactory('lien', $veto->user->id, $veto->user->name, 'vetoAdmin.show');

      $email = $this->itemFactory(null, null, $veto->user->email, null);

      $cro = $this->itemFactory(null, null, $veto->cro ,null);

      $cp = $this->itemFactory(null, null, $veto->cp, null);

      $tel = $this->itemFactory(null, null, $this->ajouteEspaceTel($veto->tel), null);

      $suppr = $this->itemFactory('del', $veto->user->id, null, 'vetoAdmin.destroy');

      $description = [
        $nom,
        $email,
        $cro,
        $cp,
        $tel,
        $suppr,
      ];

      $this->liste->put($veto->id , $description);

    }

    return $this->liste;
  }
}
