<?php
namespace App\Http\Traits;

/**
 * Trait pour transformer csv avec analyses et anaitem en tableau pour la table pivot
 */
trait LitCsv
{
  function litCsv($nom)
  {
    $context = stream_context_create(
        array(
            "http" => array(
                "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
            )
        )
    );
    $tableau = [];

    if(file_exists('storage/'.$nom.'.csv')) {

      $handle = fopen('storage/'.$nom.'.csv','r');
      $datas = file('storage/'.$nom.'.csv');
      $datas = array_slice($datas, 1);
      for ($i=0; $i < count($datas) ; $i++) {
        $ligne = explode(";", $datas[$i]);
        for ($j=1; $j < count($ligne) ; $j++) {
          $tableau[$i+1][$j] = $ligne[$j];
        }
      }
    }
    $nouveau_tableau = [];
    for ($i=1; $i <= count($tableau) ; $i++) {
      for ($j=1; $j <= count($tableau[$i]) ; $j++) {
        if(trim($tableau[$i][$j]) == 1) {
          $nouveau_tableau[] = [
            "analyse_id" => $i,
            "anaitem_id" => $j,
          ];
        }

      }
    }

    return $nouveau_tableau;

  }

}
