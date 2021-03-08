<?php
namespace App\Http\Traits;

/**
 *
 */
trait QuoteToChevron
{
  // Remplace les doubles quote par un chevron pour éviter la confusion avec une fin de phrase
  function quoteToChevron($string)
  {
    // On calcul le  nombre de doublequote
    $nb_occurrence = substr_count($string, '"');
    // S'il y en a deux
    if($nb_occurrence === 2) {
      // On explose la phrase sur la base des doublesquote
      $tableau = explode('"', $string);
      // Et on la recompose
      $string_modif = $tableau[0] . '«' . $tableau[1] . '»' . $tableau[2];
    // Si le nombre de double quote ne vaut pas deux (phrase qui risque dêtre incompréhensible)
    } else {
      // On élimine les doublesquotes
      $string_modif = str_replace('"', '', $string);
    }

    return $string_modif;

  }
  
}
