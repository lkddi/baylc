<?php

namespace App\Services\WeChatFerry;

use Illuminate\Support\Facades\Http;



class Api
{
    private $server;

    public function __construct()
    {
        $this->server = 'http://10.10.11.13:9999';
    }

    public function SendTextMsg($robot_wxid='', $to_wxid, $msg)
    {
        $data = [];
//        $data['robot_wxid'] = $robot_wxid;
        $data['receiver'] = $to_wxid;
        $data['msg'] = $msg;
        $data['aters'] = '';
//        \Log::info($data);
        return $this->post('/text', $data);
    }

    public function post($url, $data)
    {
        $url = $this->server . $url;
        $response = Http::acceptJson()->post($url, $data);
        return $response->json();
    }
}
