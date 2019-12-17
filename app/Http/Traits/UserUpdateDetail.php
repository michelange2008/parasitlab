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
      // $this->vetoUpdateDetail($id, $datas);
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
    $datas = $request->all();

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

    // return redirect()->route('vetoAdmin.show', $id);
  }

  public function eleveurUpdateDetail($id, $datas)
  {
    $datas = $request->all();

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
    if(isset($datas['icone']))
    {
      $this->storeFile($datas['icone'], $datas['iconeNom'], 'public/img/icones');
    }

    DB::table('labos')->where('user_id', $id)
          ->Update([
            'user_id' => $id,
            // 'signature' => $datas['signature'],
            // 'icone_id' => $datas['icone_id'],
            'fonction' => $datas['fonction'],
          ]);

    return redirect()->route('laboAdmin.index');
  }

  public function storeFile($icone, $filename, $path)
  {

    $icone->storeAs($path, $filename);

  }
}
