<?php

namespace App\Services\WeChatFerry;

use App\Models\WxGroup;
use App\Models\WxImg;
use App\Servers\ApiAylc;
use App\Wechats\EventGroupMemberAdd;
use App\Wechats\VlwApiServer;
use Illuminate\Support\Facades\Log;
use Exception;

class Group
{
    public function Group($data)
    {
        try {
            $group = WxGroup::wxid($data['roomid'])->first();
            if ($group) {
                //群改成员登记
                if ($group['user']) {
                    EventGroupMemberAdd::AddUserWfc($data);
                }
                // 销售登记
                if (isset($group['admin_wxid']) && $group['isadd']) {
                    if (strpos($data['content'], '增加') !== false) {
                        if (strpos($data['content'], '增加') == 0) {
                            $title = str_replace('增加 ', '', $data['content']);
                            $x = explode(' ', $title);
                            if (count($x) >= 3) {
                                AddSale::AddSale($data['roomid'], $x[0], $x[1], $x[2], $x[3] ?? 1);
                            }
                        }
                    }

                }
            } else {
                $g = new WxGroup();
                $g->wxid = $data['roomid'];
                $g->save();
            }
        } catch (Exception $e) {
            throw $e;
        }
    }


}
