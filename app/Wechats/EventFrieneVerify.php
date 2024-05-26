<?php

namespace App\Wechats;

use App\Models\WxBot;
use Illuminate\Support\Facades\Log;

class EventFrieneVerify
{
    public static function run($data)
    {
        $bot = WxBot::wxid($data['robot_wxid'])->first();
        if ($bot['friend']){
            $type = $data['json_msg']['type'] ?? $data['type'];
           $a = VlwApiServer::AgreeFriendVerify($data['robot_wxid'],$data['json_msg']['v1'],$data['json_msg']['v2'],$type);
            Log::info('自动加好友！');
//            Log::info(json_decode($a,true));
        }
}
}
