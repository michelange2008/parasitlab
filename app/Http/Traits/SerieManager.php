<?php
namespace App\Http\Traits;

use App\Models\Productions\Serie;

/**
 * Trait destiné à gérer la création et la suppression de séries
 * Impossible de le faire dans le SerieController car creation et suppression de séries
 * son liées à la gestion des demandes gérée par DemandeController.
 */
trait SerieManager
{
  function serieStore($user_id, $espece_id, $anapack_id)
  {
      $nouvelle_serie = new Serie;

      $nouvelle_serie->user_id = $user_id;
      $nouvelle_serie->anapack_id = $anapack_id;
      $nouvelle_serie->espece_id = $espece_id;

      $nouvelle_serie->save();

      return $nouvelle_serie;

    }

}
