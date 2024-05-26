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
        Log::info($message);
        $message_data = $message['message_data'];
        if (IfRoomid($message_data)){
            $group = WxWork::where('roomid', $message_data['conversation_id'])->first();
            if ($group && $group->photo){
                Log::info('群聊图片消息处理-开启');
                //图片消息保存到数据库
                $data = $message_data;
                $data['cdn'] = json_encode($message_data['cdn']);
                WxWorkImg::create($data);
                unset($data);
                Log::info('图片消息保存到数据库');

//                if (IfRoomid($message_data)){
//                    $path = str_replace(':', '', $message_data['conversation_id']);
//                }else{
//                    $path = $message_data['sender'];
//                }
//                $filename = $message_data['appinfo'].'_'.$message_data['sender']. '.jpg';
//                $message_data['save_path'] = 'c:\\cdn\\'.$path.'\\'.$filename;
//                QyWechatData::down_img($message_data);
            }
        }
        return true;
    }
}
