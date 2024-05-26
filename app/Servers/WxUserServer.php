<?php

namespace App\Servers;

use App\Models\WxGroup;
use App\Models\WxUser;
use App\Wechats\VlwApiServer;

class WxUserServer
{
    //群用户操作

    public static function checkNew($wid)
    {
        $group = WxGroup::where('wxid', $wid)->first();
        if ($group && $group['user']) {
            $req = VlwApiServer::GetGroupMember($group->robot_wxid, $group->wxid, 0);
            $r = json_decode($req, true);
            if (!$r['Code'] && is_array($r['ReturnJson']['member_list'])) {
                foreach ($r['ReturnJson']['member_list'] as $u) {
                    self::updateUser($u, $wid);
                }
                WxUser::where('group_wxid', $wid)->where('new', 0)->delete();
                WxUser::where('group_wxid', $wid)->update(['new' => 0]);
            }

        }
        return '未开启更新';
    }

    /**
     * @param $data
     * @param $wxid
     */
    public static function updateUser($data, $wxid)
    {
        $user = WxUser::updateOrCreate(
            ['wxid' => $data['wxid'], 'group_wxid' => $wxid],
            ['nickname' => $data['nickname'], 'avatar' => $data['avatar'], 'new' => 1]
        );
    }

    /**
     * 修改用户门店
     * @param $user
     * @param $store
     * @return void
     */
    public function updateUserStore($user, $store)
    {
        $user->zt_store_code = $store;
        $user->save();
    }

}
