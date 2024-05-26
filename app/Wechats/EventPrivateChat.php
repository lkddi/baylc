<?php

namespace App\Wechats;

use Illuminate\Foundation\Bootstrap\LoadConfiguration;
use Illuminate\Support\Facades\Log;

class EventPrivateChat
{
    public static function run($data)
    {
        $q = ['Code' => 0];
//        Log::info('3333');
        if ($data['msg'] == '1' && $data['type'] == '1') {
            $msg = '我在呢！！！！';
            VlwApiServer::SendTextMsg($data['robot_wxid'], $data['from_wxid'], $msg);
//            QxApiServer::SendTextMsg($data['robot_wxid'], $data['from_wxid'], $msg);
            return $q;
        }
//        VlwApiServer::AgreeGroupInvite($data['robot_wxid'],$data['from_wxid'],$msg);
        return $q;
    }

}
