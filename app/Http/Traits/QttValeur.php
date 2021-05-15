<?php
namespace App\Http\Traits;

use App\Models\Analyses\Qtt;
/**
 * Trait destiné à renvoyer l'objet Qtt dont le nom est 'valeur'
 * Ce trait est lié au fait que les parasites qui ont une valeur (en opg par exemple)
 * sont saisis avec un multiple (par ex 10 fait 500 opg si le multiple de l'anaitem est 50)
 */
trait QttValeur
{

  public function qttValeur()
  {
    return Qtt::where('nom', 'valeur')->first();
  }

}
