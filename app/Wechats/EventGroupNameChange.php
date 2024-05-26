<?php

namespace App\Wechats;

use App\Models\WxGroup;

class EventGroupNameChange
{
    public static function update($data)
    {
        $group = WxGroup::wxid($data['from_group'])->first();
        if ($group) {
            //群改名后修改
            $name = $data['from_group_name'] ?? $data['new_name'];
            if ($group->title != $name) {
                $group->title = $name;
                $group->robot_wxid = $data['robot_wxid'];
                $group->save();
            }
            return ['Code' => -1];
        }
    }
}
