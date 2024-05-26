<?php

namespace App\Wechats;

use App\Models\WxBot;
use App\Models\WxUser;
use Illuminate\Support\Facades\Log;

class EventInvitedInGroup
{
    public static function run($data)
    {
        $bot = WxBot::where('wxid', $data['robot_wxid'])->first();
        if ($bot['group']) {
            Log::info('邀请入群操作');
            $r = VlwApiServer::AgreeGroupInvite($data['robot_wxid'], $data['from_wxid'], $data['msg']['invite_url']);
//            Log::info(json_decode($r, true));
            //自动获取群内成员信息
//            self::GetGroupMember($data['robot_wxid'], $data['from_wxid'],1);
        }
    }



}
