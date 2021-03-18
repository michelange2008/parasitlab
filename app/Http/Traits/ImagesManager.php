<?php
namespace App\Http\Traits;

/**
 * Gestion des images
 */
trait ImagesManager
{
  /**
  * Elimine les images quand on modifie une image ou qu'on supprime un article
  *
  * Vérifie que l'image existe avant d'essayer de la supprimer
  *
  * TODO: lever une exception plutôt que de faire ce que j'ai fait en-dessous
  *
  * @return void
  */
  function supprImage($image_avec_chemin)
  {

    if(file_exists($image_avec_chemin)) {

      unlink($image_avec_chemin);

    }

    else {
      dd('pb');
    }

  }

}
