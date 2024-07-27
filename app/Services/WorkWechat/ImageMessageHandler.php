<?php

namespace App\Services\WorkWechat;


use App\Models\WxWork;
use App\Models\WxWorkImg;
use App\Services\QyWechatData;
use Log;

class ImageMessageHandler implements MessageHandlerInterface
{
    /**
     * 处理图片消息
     *
     * @param array $message
     * @return string
     */

    public function handle($message)
    {
        Log::info('图片消息处理');
//        Log::info($message);
        $message_data = $message['message_data'];
        if (IfRoomid($message_data)){
            $group = WxWork::where('roomid', $message_data['conversation_id'])->first();
            if ($group && $group->photo){
                //图片消息保存到数据库
                $data = $message_data;
                $data['cdn'] = json_encode($message_data['cdn']);
                $data['path'] = $message_data['cdn']['save_path'];
                WxWorkImg::create($data);
                unset($data);
                Log::info('图片消息保存到数据库');
            }
        }
        return true;
    }
}
