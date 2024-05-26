<?php

namespace App\Servers;

class ApiAylc
{
    //ay 短网址接口

    public static function add($url)
    {
        $data = json_decode(self::http_request($url),true);
        if ($data['id']){
            return $data['url'];
        }
        dd($data);
    }

    //HTTP请求（支持HTTP/HTTPS，支持GET/POST）
    public static function http_request($url)
    {
        $datas = [
            "target" => $url,
            "apikey" => "554f9c35c47d6039716306ee7e1aebf9",
//            "key" => ''
        ];
        $url = "https://ay.lc/usr/plugins/ShortLinks/post.php";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);//设置传送的参数

//        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $datas));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//                'Content-Type: application/json; charset=utf-8',
//                'Content-Length: ' . strlen(json_encode( $datas))
//            )
//        );
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $response;
    }
}
