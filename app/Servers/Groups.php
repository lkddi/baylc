<?php

namespace App\Servers;

use App\Models\WxGroup;
use App\Wechats\VlwApiServer;

class Groups
{
    //群获取并更新

    public static function chaeck($bot_id)
    {

        $groups = VlwApiServer::GetGrouplist($bot_id, true);
        $groups = json_decode($groups, true);
        if (!$groups['Code']) {
            if (is_array($groups['ReturnJson'])) {
                foreach ($groups['ReturnJson'] as $group) {
                    self::update($group);
                }
            }
        }
        self::delGroup();
    }

    /**
     * 更新群信息
     * @param $group
     * @return bool|void
     */
    public static function update($group)
    {
        $data = WxGroup::where('wxid', $group['wxid'])->first();
        if ($data) {
            $data->title = $group['nickname'];
            $data->new = 1;
            $data->save();
            return true;
        } else {
            $g = new WxGroup();
            $g->wxid = $group['wxid'];
            $g->title = $group['nickname'];
            $g->new = 1;
            $g->save();
        }
    }

    /**
     * 删除数据库中不存在的群
     * @return void
     */
    public static function delGroup()
    {
        WxGroup::where('new', 1)->update(['new' => 0]);
    }

    /**
     * 群踢人 删除数据库内成员
     * @param $data
     * @return false
     */
    public static function delGroupUser($data)
    {
        $from_group = $data['from_group'];
        $wid = $data['to_wxid'];
        $user = qUser($wid, $from_group);
        if ($user) {
            $user = $user->delete();
        }
        return $user;
    }


}
