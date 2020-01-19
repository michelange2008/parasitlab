<?php
namespace App\Http\Traits;

/**
 * CONSTRUIT LES ELEMENTS QUI RENTRENT DANS LA LISTE DES FOURNISSEURS
 */
trait ListeItemFactory
{
  function itemFactory($action, $id, $nom, $route)
  {
    $item = collect();

    if (isset($action)) {

      $item->action = $action;

    }


    if(isset($id))
    {

      $item->id = $id;

    }

    if(isset($nom))
    {

      $item->nom = $nom;

    }

    if (isset($route))
    {

      $item->route = $route;

    }

    return $item;
  }
}
