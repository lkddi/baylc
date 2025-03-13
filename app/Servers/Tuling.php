<?php

namespace App\Servers;

class Tuling
{

//HTTP请求（支持HTTP/HTTPS，支持GET/POST）
    public static function http_request($msg = null,$wxid =null)
    {
        $datas = [
            "spoken" => $msg,
            "appid" => "b0940a9ed2092387f48e9204d2987909",
            "userid" => $wxid
        ];
        $url = "https://api.ownthink.com/bot";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $datas));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json; charset=utf-8',
                'Content-Length: ' . strlen(json_encode( $datas))
            ]
        );
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $response;
    }
}
