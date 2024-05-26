<?php

namespace App\Servers\WeChatFerry;

use App\Models\WxGroup;

class Group
{
    public function CheckGroup($data)
    {
        $group = WxGroup::wxid($data['roomid'])->first();
        if ($group) {
            $user = [
                'from_group' => $data['roomid'],
                'from_wxid' => $data['from_wxid'],

            ];
            if ($group['user']) {
//                EventGroupMemberAdd::run($data);
            }
        }
    }
}
