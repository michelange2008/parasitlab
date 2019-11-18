<?php
namespace App\Http\Traits;

use App\Models\Usertype;

trait QuelUsertype {

  public function estVeto($usertype_id)
  {
    $usertype = Usertype::find($usertype_id);

    return ($usertype->route === "veterinaire");
  }

  public function estEleveur($usertype_id)
  {
    $usertype = Usertype::find($usertype_id);

    return ($usertype->route === "eleveur");
  }
}
