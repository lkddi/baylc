<?php

namespace App\Plugin;

use App\Models\WxImg;
use App\Servers\ApiAylc;
use App\Wechats\VlwApiServer;
use Illuminate\Support\Facades\Log;
use App\Models\RuningGroup as RunGropu;
use Spider;

class RuningGroup
{
    public static function run($data)
    {
        if ($data['type'] == '3') {
        $x = new RunGropu();
        $group['admin_wxid'] = '17905953915@chatroom';
        $x->wxid = $data['from_wxid'];
        $name = $data['from_name'] ?? findWxUserName($data['from_wxid'], $data['from_group']);
            $msg = explode($data['robot_wxid'], $data['msg']);
            $msg = mb_substr($msg[1], 1);
            $msg = explode(']', $msg);
            $img = 'http://bot.ay.lc/Data/' . $data['robot_wxid'] . '/' . $msg[0];
            $x->photo = 'files/'.$msg[0];
            $x->save();
            $spider = new Spider();
            $spider->downloadImage($img);
            $url = 'https://j.ay.lc/pages/sale/sale?id=' . $x->id;
            $url = ApiAylc::add($url);
            $msg = $name . '在【跑团群】发了一张图片，点击查看登记：' . $url;
            VlwApiServer::SendTextMsg($data['robot_wxid'], 'dd23com', $msg);
        }
    }
}
