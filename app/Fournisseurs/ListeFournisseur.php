<?php
namespace App\Fournisseurs;

/**
 * CLASSE ABSTRAITE POUR LES TRAITS LISTE****FOURNISSEUR
 */

abstract class ListeFournisseur

{
  private $datas;

  private $liste;
  /*
  * Renvoie une collection avec toutes les infos pour afficher
  * un tableau: titre, icone, intitulés, liste
  */
  abstract protected function renvoieDatas();

  /*
  * Renvoie un tableau $liste avec toutes les lignes à afficher
  */
  abstract protected function creeListe($liste);

  /*
  * Crée les items de la liste à afficher renvoyer par la méthode liste
  */
  public function itemFactory($action, $id, $nom, $route)
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
