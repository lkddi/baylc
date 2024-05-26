<?php

namespace App\Servers;

use App\Models\WxForward;
use App\Models\WxZhuanfa;
use App\Wechats\VlwApiServer;
use Illuminate\Support\Facades\Log;

class GroupZhuanfa
{
    //群转发

    public static function zhuanfa($data)
    {
        $group = WxForward::where('wxid', $data['from_group'])->first();
        if ($group) {
            if ($group['open']) {
                if ($data['msg'] == '关闭群转发') {
                    $group->open = 0;
                    $group->save();
                    VlwApiServer::SendTextMsg($data['robot_wxid'], $data['from_group'], '[OK][OK][OK]群消息转发已经关闭，可以放心的聊天了。');
                    return true;
                }
                if ($data['msg'] == '发送') {
                    WxZhuanfa::Where('state',1)->where('start',0)->update(['start'=>1]);
                    VlwApiServer::SendTextMsg($data['robot_wxid'], $data['from_group'], '[OK]收到立即执行。');
                    return true;
                }
                $data['group'] = json_decode($group['towxid']);
                //  1/文本消息 3/图片消息 34/语音消息  42/名片消息  43/视频 47/动态表情 48/地理位置
                if ($group['text'] && $data['type'] == '1') {
                    self::send($data, 'text');
                    return true;
                } elseif ($group['img'] && $data['type'] == '3') {
                    self::send($data, 'img');
                    return true;
                } elseif ($group['file'] && $data['type'] == '1') {
                    self::send($data, 'file');
                    return true;
                } elseif ($group['video'] && $data['type'] == '43') {
                    self::send($data, 'video');
                    return true;
                } elseif ($group['xml'] && $data['type'] == '2002' && $data['type'] == '49') {
                    self::send($data, 'xml');
                    return true;
                } elseif ($group['link'] && $data['type'] == '47') {
                    self::send($data, 'link');
                    return true;
                }
            } else {
                if ($data['msg'] == '开启群转发') {
                    $group->open = 1;
                    $group->save();
                    VlwApiServer::SendTextMsg($data['robot_wxid'], $data['from_group'], '[闭嘴]群转发已经开启，接下来在本群所发的所有内容我会记下来。');
                    return true;
                } elseif ($data['msg'] == '关闭群转发') {
                    VlwApiServer::SendTextMsg($data['robot_wxid'], $data['from_group'], '[OK]群转发已关闭，可以聊天了。');
                    return true;
                } elseif (strpos($data['msg'], '@小不点 ') !== false) {
                    $req = Tuling::http_request($data['msg'], '');
                    $req = json_decode($req);
                    if ($req->message == "success") {
                        VlwApiServer::SendTextMsg($data['robot_wxid'], $data['from_group'], $req->data->info->text);
                        return true;
                    }
                }
            }
        }
    }

    /**
     * 转发消息
     * @param $data
     * @param $type
     * @return void
     */
    public static function send($data, $type)
    {
        $q = ['Code' => -1];
        foreach ($data['group'] as $group) {
            switch ($type) {
                case 'text' || 'xml';
                    self::add($data,$group,'SendTextMsg');
                    break;
                case 'img';
                    self::add($data,$group,'SendImageMsg');
                    break;
                case 'file';
                    self::add($data,$group,'SendFileMsg');
                    break;
                case 'video';
                    self::add($data,$group,'SendVideoMsg');
                    break;
                case 'link';
                    self::add($data,$group,'SendLinkMsg');
                    break;
            }
        }
        VlwApiServer::SendTextMsg($data['robot_wxid'], $data['from_group'], '[OK]我已经记下来了，等待你说[发送],我就开始工作了。');
        return;
    }

    public static function add($data,$to_wxid,$type)
    {
        $msg = new WxZhuanfa();
        $msg->type = $type;
        $msg->msg = $data['msg'];
        $msg->to_wxid = $to_wxid;
        $msg->robot_wxid = $data['robot_wxid'];
        $msg->save();
    }
}
