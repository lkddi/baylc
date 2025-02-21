<?php

namespace App\Services\WorkWechat;

use App\Models\WxGroup;
use App\Models\WxWork;
use App\Services\QyWechatData;
use App\Services\WxBot;
use Cache;
use EasyWeChat\Kernel\Messages\Message;
use Log;

class OtherMessageHandler implements MessageHandlerInterface
{
    public function handle($message)
    {
        // 消息类型有种，忽略指定的类型
        $types = ['11171', '11154'];
        if (in_array($message['message_type'], $types)) return null;

        if ($message['message_type'] == '11078') {
            $group = WxWork::where('roomid', $message['message_data']['room_conversation_id'])->first();
            if ($group) {
                $group->roomname = $message['message_data']['room_name'];
                $group->save();
            } else {
                $group = WxWork::create([
                    'roomid' => $message['message_data']['room_conversation_id'],
                    'roomname' => $message['message_data']['room_name'],
                ]);
            }
        } elseif ($message['message_type'] == '11026') {//机器人上线  用户登录成功通知
            Cache::forget('login');
            WxBot::updateOrCreate(
                [
                    'wxid' => $message['message_data']['user_id']
                ],
                [
                    'username' => $message['message_data']['username'],
                    'online' => 1,
                    'robot_type' => 1,
                    'wx_headimgurl' => $message['message_data']['avatar'],
                    'clientId' => $message['client_id'],
                ]
            );
            sendIyuu('小小天天不迟到', '小小来上班了');
            QyWechatData::send_work_msg('销售助理上线了，大家可以放心使用了！', 1);
//            QyWechatData::send_work_msg('销售助理上线了，大家可以放心使用了！', 2);

        } elseif ($message['message_type'] == '11027') {
            WxBot::updateOrCreate(
                [
                    'wxid' => $message['message_data']['user_id']
                ],
                [
                    'online' => 0,
                    'client_id' => '',
                ]
            );
            sendIyuu('小小走丢了，去看看什么问题把', '小小走丢了');
        } elseif ($message['message_type'] == '11038') {//群列表 将群信息增加到数据库
            foreach ($message['message_data']['room_list'] as $room) {
                WxWork::updateOrCreate(
                    [
                        'roomid' => $room['conversation_id']
                    ],
                    [
                        'roomname' => $room['nickname'],
                    ]);
            }
        } elseif ($message['message_type'] == '11047') {//自动加群
            $bot = WxBot::where('wxid', $message['message_data']['receiver'])->first();
            if ($bot) {
//                if ($bot->group) {
//                    QyWechatData::send_work_join($message['client_id'], $message['message_data']['url']);
//                }
            }

        } elseif ($message['message_type'] == '11063') {
            $bot = WxBot::where('clientId', $message['client_id'])->first();
            if ($bot) {
//                if ($bot->friend) {
//                    QyWechatData::send_work_add_friend($message['client_id'],$message['message_data']['user_id'], $bot->wxid);
//                }
            }
        } elseif ($message['message_type'] == '11072') {
            $work = WxWork::where('roomid', $message['message_data']['room_conversation_id'])->first();
            if (!$work) {
                WxWork::create([
                    'roomid' => $message['message_data']['room_conversation_id'],
                ]);
            }
        } elseif ($message['message_type'] == '11038') {
            if (isset($message['message_data']['room_list'])) {
                $rooms = $message['message_data']['room_list'];
                foreach ($rooms as $room) {
                    WxGroup::updateOrCreate([
                        'roomid' => $room['conversation_id']
                    ], [
                        'roomname' => $room['nickname'],
                        'new' => 1
                    ]);
                }
            }

        } elseif ($message['message_type'] == '11001') {
            $value = Cache::get('login', 0);
            $value += 1;
            Cache::put('login', $value, $seconds = 10);

            if (Cache::get('login') == 2) {
                QyWechatData::send_work_msg('销售助理不知为何罢工了，请尽快查看！', 1);
//                QyWechatData::send_work_msg('销售助理不知为何罢工了，请尽快查看！', 2);
                QyWechatData::login();
            }

        }


        return null;
    }
}
