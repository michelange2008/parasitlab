<?php
namespace App\Http\Traits;

/**
 *
 */
trait TelechargePdf
{
  function telechargePdf($fichier, $nom)
  {

    if (file_exists('storage/pdf/'.$fichier.'.pdf'))
    {
    // Vous voulez afficher un pdf
    header('Content-type: application/pdf');

    // Il sera nommé demande_analyse_parasito.pdf
    header('Content-Disposition: attachment; filename='.$nom.'.pdf');

    // Le source du PDF original.pdf
    readfile('storage/pdf/'.$fichier.'.pdf');
    }
  }
}
