<?php
namespace App\Http\Traits;

use App\Models\Eleveur;

use App\Http\Traits\FormatEde;
use App\Http\Traits\FormatTel;
use App\Http\Traits\LitJson;
/**
 * FOURNIT UNE LISTE DES ELEVEURS POUR LA VUE TABLEAU INDEX
 */
trait ListeEleveursFournisseur
{

  use FormatTel, FormatEde, LitJson;

    public function tableau()
    {
      $eleveurs = Eleveur::all();

      $tableauEleveurs = collect();

      $tableauEleveurs->titre = "liste des éleveurs"; // TITRE DU TABLEAU

      $tableauEleveurs->userType = $eleveurs[0]->user->userType; // TYPE D'UTILISATEUR

      $tableauEleveurs->intitules = $this->litJson("tableauEleveurs"); // EN TETE DES COLONNES

      $tableauEleveurs->liste = $this->liste($eleveurs); // LIGNES DU TABLEAU

      return $tableauEleveurs;
    }


    public function liste($eleveurs)
    {

      $liste = collect();

      foreach ($eleveurs as $eleveur) {
        $description = [];

        $nom = collect();
        $nom->action = 'lien';
        $nom->id = $eleveur->user->id;
        $nom->nom = $eleveur->user->name;
        $nom->route = 'eleveurAdmin.show';

        $email = collect();
        $email->action = '';
        $email->nom = $eleveur->user->email;

        $ede = collect();
        $ede->action = '';
        $ede->nom = $this->edeAvecEspace($eleveur->ede);

        $cp = collect();
        $cp->action = '';
        $cp->nom = $eleveur->cp;

        $commune = collect();
        $commune->action = '';
        $commune->nom = $eleveur->commune;

        $tel = collect();
        $tel->action = '';
        $tel->nom =  $this->ajouteEspaceTel($eleveur->tel);

        $veto = collect();
        $veto->action = 'lien';
        $veto->id = $eleveur->veto->user->id;
        $veto->nom = $eleveur->veto->user->name;
        $veto->route = 'vetoAdmin.show';
        // $description->veto = $veto;
        $suppr = collect();
        $suppr->id = $eleveur->veto->user->id;
        $suppr->action = 'del';
        $suppr->route = 'vetoAdmin.destroy';

        $description = [
          $nom,
          $email,
          $ede,
          $cp,
          $commune,
          $tel,
          $veto,
          $suppr,
        ];

        $liste->put($eleveur->id , $description);


      }

      return $liste;

    }

}
