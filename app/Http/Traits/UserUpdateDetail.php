<?php
namespace App\Http\Traits;

use DB;

use App\Models\Icone;
use App\Http\Traits\ImagesManager;

/**
 * ISSU DE App\Http\Controllers\UserController@update
 * MET A JOUR LES INFORMATIONS SPECIFIQUES DES UTILISATEURS
 */
trait UserUpdateDetail
{
  use ImagesManager;

  function userUpdateDetail($user, $datas)
  {

    if($this->estVeto($user->usertype_id))
    {
      $this->vetoUpdateDetail($user, $datas);
    }
    elseif ($this->estEleveur($user->usertype_id))
    {
      $this->eleveurUpdateDetail($user, $datas);
    }
    elseif ($this->estLabo($user->usertype_id))
    {
      $this->laboUpdateDetail($user, $datas);
    }
  }

  public function vetoUpdateDetail($user, $datas)
  {
    DB::table('vetos')->where('user_id', $user->id)
          ->Update([
            'user_id' => $user->id,
            'num' => $datas['num'],
            'address_1' => $datas['address_1'],
            'address_2' => $datas['address_2'],
            'cp' => $datas['cp'],
            'commune' => $datas['commune'],
            'pays' => $datas['pays'],
            'indicatif' => $datas['indicatif'],
            'tel' => $datas['tel'],
          ]);

    return redirect()->route('vetoAdmin.show', $user->id);
  }

  public function eleveurUpdateDetail($user, $datas)
  {
    DB::table('eleveurs')->where('user_id', $user->id)
          ->Update([
            'user_id' => $user->id,
            'num' => $datas['num'],
            'address_1' => $datas['address_1'],
            'address_2' => $datas['address_2'],
            'cp' => $datas['cp'],
            'commune' => $datas['commune'],
            'pays' => $datas['pays'],
            'indicatif' => $datas['indicatif'],
            'tel' => $datas['tel'],
            'veto_id' => ($datas['veto_id'] == 0 || $datas['veto_id'] == "null") ? null : $datas['veto_id']
            // si le veto est à créer (veto_id = 0) on lui met temporairement une valeur nulle (aucun vétérinaire) en atendant de créer le véto
            // Et si on n'a pas saisi de véto, le data['veto_id'] = "null" (string) et non null 

          ]);

      // return redirect()->route('eleveurAdmin.show', $user->id);

  }

  public function laboUpdateDetail($user, $datas)
  {


    if(isset($datas['photo_nouvelle'])) // Si une photo a été choisie
    {

      if ($user->labo->photo != "default.jpg")  //Et que l'utilisateur a déjà une photo
      {
        $this->supprImage('storage/img/labo/photos/'.$datas['photo_default']); // On supprime l'ancienne photo
      }

      $datas['photo_nouvelle']->store('public/img/labo/photos'); // On l'enregistre

      DB::table('labos')->where('user_id', $user->id) // Et on met à jour les infos dans la base de donnee
      ->Update([
        'user_id' => $user->id,
        'photo' => $datas['photo_nouvelle']->hashName(),
      ]);
    }

    if(isset($datas['signature_nouvelle']))
    {
      if($user->labo->signature != "default.svg")
      {
        $this->supprImage('storage/img/labo/signatures/'.$user->labo->signature);
      }

      $datas['signature_nouvelle']->store('public/img/labo/signatures');

      DB::table('labos')->where('user_id', $user->id)
      ->Update([
        'user_id' => $user->id,
        'signature' => $datas['signature_nouvelle']->hashName(),
      ]);

    }

    if (isset($datas['fonction'])) {

      DB::table('labos')->where('user_id', $user->id)
      ->Update([
        'user_id' => $user->id,
        'fonction' => $datas['fonction'],
      ]);

    }

    if(isset($datas['signataire'])) {

      DB::table('labos')->where('user_id', $user->id)
      ->Update([
        'user_id' => $user->id,
        'est_signataire' => true,
      ]);

    } else {

      DB::table('labos')->where('user_id', $user->id)
      ->Update([
        'user_id' => $user->id,
        'est_signataire' => false,
      ]);

    }


    return redirect()->route('laboAdmin.index');
  }

}
