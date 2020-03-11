<?php
namespace App\Http\Traits;

trait LitJson {

    public function litJson($json)
    {
      $context = stream_context_create(
          array(
              "http" => array(
                  "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
              )
          )
      );
//dd(asset('storage'));
      if(file_exists('storage/json/'.$json.'.json')) {

        return $datas = json_decode(file_get_contents('storage/json/'.$json.'.json'));

      }

    }

}
