<?php
namespace App\Http\Traits;

/**
 * Gestion des images
 */
trait ImagesManager
{
  //Elimine les images quand on modifie une image ou qu'on supprime un article
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
