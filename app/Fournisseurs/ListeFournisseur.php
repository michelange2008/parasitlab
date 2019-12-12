<?php
namespace App\Fournisseurs;

use App\Http\Traits\LitJson;

/**
 * CLASSE ABSTRAITE POUR LES TRAITS LISTE****FOURNISSEUR
 */
abstract class ListeFournisseur
{
  use LitJson;

  private $datas;

  private $liste;
  /*
  * Renvoie une collection avec toutes les infos pour afficher
  * un tableau: titre, icone, intitulés, liste
  */

  public function renvoieDatas($liste_origine, $titre, $icone, $fichier_intitules) {

    $this->datas = collect();

    $this->datas->titre = $titre; // TITRE DU TABLEAU

    $this->datas->icone = $icone; // ICONE DE L'UTILISATEUR

    $this->datas->intitules = $this->litJson($fichier_intitules); // EN TETE DES COLONNES

    $this->datas->liste = $this->creeListe($liste_origine); // LIGNES DU TABLEAU

    return $this->datas;
  }

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
