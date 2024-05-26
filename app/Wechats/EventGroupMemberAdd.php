<?php

namespace App\Wechats;

use App\Models\WxGroup;
use App\Models\WxUser;

class EventGroupMemberAdd
{
//    群添加新人消息处理

    public static function run($data)
    {
        $group = WxGroup::where('wxid',$data['from_group'])->first();
        if ($group && $group['user']){
            //群好友是否记录到数据库
            if (isset($data['from_wxid'])) {
                $user = WxUser::where('wxid', $data['from_wxid'])
                    ->where('group_wxid', $data['from_group'])
                    ->first();
                if (!$user) {
                    $user = new WxUser();
                    $user->nickname = $data['from_name'];
                    $user->wxid = $data['from_wxid'];
                    $user->group_wxid = $data['from_group'];
                    $user->save();
                }else{
                    $user->nickname = $data['from_name'];
                    $user->save();
                }
            }
        }
    }

    public static function AddUserWfc($data){
        if ($data['sender'] ==NULL) return;
        $user = WxUser::where('wxid', $data['sender'])
            ->where('group_wxid', $data['roomid'])
            ->first();
        if (!$user) {
            $user = new WxUser();
            $user->wxid = $data['sender'];
            $user->group_wxid = $data['roomid'];
            $user->save();
        }
    }

    public static function GetGroupMember($robot_wxid, $group_wxid, $is_refresh)
    {
        $r = VlwApiServer::GetGroupMember($robot_wxid, $group_wxid, 1);
        $r = json_decode($r, true);
        if (!$r['Code']) {
            if (is_array($r['ReturnJson']['member_list'])) {
                foreach ($r['ReturnJson']['member_list'] as $user) {
                    $flight = WxUser::firstOrCreate(
                        ['group_wxid' => $r['ReturnJson']['group_wxid'], 'wxid' => $user['wxid']],
                        ['name' => $user['group_nickname'], 'nickname' => $user['nickname'], 'zt_store_code' => 0]
                    );
                }
            }
        }
    }
}
