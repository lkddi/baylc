<?php

namespace App\Services\WorkWechat;

use App\Models\WxWork;
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

        return null;
    }
}
