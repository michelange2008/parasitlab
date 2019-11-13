<?php
namespace App\Http\Traits;

trait LitJson {

    public function litJson($json)
    {
      if(file_exists('storage/json/'.$json.'.json')) {

        return $datas = json_decode(file_get_contents(asset('storage/json/'.$json.'.json')));

      }

    }

}
