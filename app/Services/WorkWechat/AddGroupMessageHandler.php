<?php

namespace App\Services\WorkWechat;

use App\Models\WxWork;
use App\Services\QyWechatData;

class AddGroupMessageHandler implements MessageHandlerInterface
{
    public $message;

    public function handle($message)
    {
        $this->message = $message;
        $this->getWelcome();
    }


    public function getWelcome()
    {
        $message = $this->message;
        $group_id = $message['message_data']['room_conversation_id'];
        $work = WxWork::with('welcomes')->where('roomid', $group_id)->first();
        if ($work && $work->welcomes) {
            $messages = collect($work->welcomes);
            $sorted = $messages->sortDesc();
            foreach ($sorted as $work) {
                if ($work->is_enabled) {
                    $this->send($work->welcome_message);
                    // 延时1秒
                    sleep(1);
                }
            }
        }
        return false;
    }

    public function getAtList()
    {
        $message = $this->message;
        $user_ids = array_map(function ($item) {
            return $item['user_id'];
        }, $message['message_data']['member_list']);
        return $user_ids;
    }

    public function send($mes)
    {
        $message = $this->message;
        $data['conversation_id'] = $message['message_data']['room_conversation_id'];
        $data['guid'] = $message['client_id'];
        $data['content'] = $mes;
        $data['at_list'] = $this->getAtList();
        QyWechatData::send_work_api($data, '/msg/send_room_at');
    }
}
