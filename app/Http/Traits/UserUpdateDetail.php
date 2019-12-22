<?php
namespace App\Http\Traits;

use DB;

/**
 * ISSU DE App\Http\Controllers\UserController@update
 * MET A JOUR LES INFORMATIONS SPECIFIQUES DES UTILISATEURS
 */
trait UserUpdateDetail
{
  function userUpdateDetail($id, $datas)
  {
    $usertype_id = $datas['usertype_id'];

    if($this->estVeto($usertype_id))
    {
      $this->vetoUpdateDetail($id, $datas);
    }
    elseif ($this->estEleveur($usertype_id))
    {
      $this->eleveurUpdateDetail($id, $datas);
    }
    elseif ($this->estLabo($usertype_id))
    {
      $this->laboUpdateDetail($id, $datas);
    }
  }

  public function vetoUpdateDetail($id, $datas)
  {
    DB::table('vetos')->where('user_id', $id)
          ->Update([
            'user_id' => $id,
            'num' => $datas['num'],
            'address_1' => $datas['address_1'],
            'address_2' => $datas['address_2'],
            'cp' => $datas['cp'],
            'commune' => $datas['commune'],
            'pays' => $datas['pays'],
            'indicatif' => $datas['indicatif'],
            'tel' => $datas['tel'],
          ]);

    return redirect()->route('vetoAdmin.show', $id);
  }

  public function eleveurUpdateDetail($id, $datas)
  {
    DB::table('eleveurs')->where('user_id', $id)
          ->Update([
            'user_id' => $id,
            'num' => $datas['num'],
            'address_1' => $datas['address_1'],
            'address_2' => $datas['address_2'],
            'cp' => $datas['cp'],
            'commune' => $datas['commune'],
            'pays' => $datas['pays'],
            'indicatif' => $datas['indicatif'],
            'tel' => $datas['tel'],
            'veto_id' => $datas['veto_id'],
          ]);

    return redirect()->route('eleveurAdmin.show', $id);

  }

  public function laboUpdateDetail($id, $datas)
  {

    if(isset($datas['photo']))
    {

      $this->storeFile($datas['photo'], $datas['icone'], 'public/img/icones');
    }

    if(isset($datas['imageSignature']))
    {
      $this->storeFile($datas['imageSignature'], $datas['signature'], 'public/img/labo');
    }

    DB::table('labos')->where('user_id', $id)
          ->Update([
            'user_id' => $id,
            'fonction' => $datas['fonction'],
          ]);

    return redirect()->route('laboAdmin.index');
  }

  public function storeFile($file, $filename, $path)
  {

    $file->storeAs($path, $filename);

  }
}
