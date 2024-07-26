<?php

namespace App\Services\WorkWechat;

use App\Models\WxWork;
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
        Log::info("OtherMessageHandler");
        Log::info($message);
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
        }
        //机器人上线  用户登录成功通知
        if ($message['message_type'] == '11026') {
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
        }

        if ($message['message_type'] == '11027') {
            WxBot::updateOrCreate(
                [
                    'wxid' => $message['message_data']['user_id']
                ],
                [
                    'online' => 0,
                ]
            );
        }

        //群列表 将群信息增加到数据库
        if ($message['message_type'] == '11038') {
            foreach ($message['message_data']['room_list'] as $room) {
                WxWork::updateOrCreate(
                    [
                        'roomid' => $room['conversation_id']
                    ],
                    [
                        'roomname' => $room['nickname'],
                    ]);
            }
        }


        return null;
    }
}
