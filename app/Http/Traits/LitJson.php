<?php
namespace App\Http\Traits;

trait LitJson {

    public function litJson($json)
    {
      $context = stream_context_create(
        array(
            "http" => array(
                'method'=>"GET",
                "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64)
                            AppleWebKit/537.36 (KHTML, like Gecko)
                            Chrome/50.0.2661.102 Safari/537.36\r\n" .
                            "accept: text/html,application/xhtml+xml,application/xml;q=0.9,
                            image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\r\n" .
                            "accept-language: es-ES,es;q=0.9,en;q=0.8,it;q=0.7\r\n" .
                            "accept-encoding: gzip, deflate, br\r\n"
            )
        )
    );

      if(file_exists('storage/json/'.$json.'.json')) {

        return $datas = json_decode(file_get_contents(asset('storage/json/'.$json.'.json'), false, $context));

      }

    }

}
