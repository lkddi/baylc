<?php

namespace App\Services\WorkWechat;

use App\Models\WxWork;
use App\Services\QyWechatData;
use App\Services\WxBot;
use EasyWeChat\Kernel\Messages\Message;
use Log;

class OtherMessageHandler implements MessageHandlerInterface
{
    public function handle($message)
    {

        // 消息类型有种，忽略指定的类型
        $types = ['11171', '11154'];
        if (in_array($message['message_type'], $types)) return null;
//        Log::info("OtherMessageHandler");
//        Log::info($message);
        $bot = WxBot::where('wxid', $message['message_data']['receiver'])->first();
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
            WxBot::updateOrCreate(
                [
                    'wxid' => $message['message_data']['user_id']
                ],
                [
                    'username' => $message['message_data']['username'],
                    'online' => 1,
                    'robot_type' => 1,
                    'wx_headimgurl' => $message['message_data']['avatar'],
                ]
            );
            sendIyuu('小小天天不迟到', '小小来上班了');

        } elseif ($message['message_type'] == '11027') {
            WxBot::updateOrCreate(
                [
                    'wxid' => $message['message_data']['user_id']
                ],
                [
                    'online' => 0,
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

            if ($bot) {
                if ($bot->group) {
                    QyWechatData::send_work_join($message['message_data']['url']);
                }
            }

        } elseif ($message['message_type'] == '11063') {
            if ($bot) {
                if ($bot->friend) {
                    QyWechatData::send_work_add_friend($message['message_data']['user_id'], $bot->wxid);
                }
            }
        }


        return null;
    }
}
