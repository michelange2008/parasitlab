<?php
namespace App\Http\Traits;

use App\Models\Parasitisme\Motclef;
/**
 * Trait destiné à fournir des outils pour la gestion du blog: élimination des fichiers quand suppression ou modification image
 * et gestion des motclefs
 */
trait BlogManager
{



// Elimine les mots clefs qui n'ont plus d'article
  public function supprMotclefsOrphelins()
  {

    $motclefs = Motclef::all();

    foreach ($motclefs as $motclef) {

      if($motclef->blogs()->count() == 0) {

        Motclef::destroy($motclef->id);

      }

    }

  }

  public function listeMotclefs($blog)
  {

    $motclefs = $blog->motclefs;

    $liste_motclefs = "";

    foreach ($motclefs as $motclef) {

      $liste_motclefs .= $motclef->motclef.', ';
    }

    return $liste_motclefs;
  }
}
