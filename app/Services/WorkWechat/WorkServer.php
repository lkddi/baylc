<?php

namespace App\Services\WorkWechat;

use App\Models\WxWork;
use App\Services\QyWechatData;

class WorkServer
{
    public array $data;
    public string $type;

    public function __construct($data)
    {
        $this->data = $data;
//        $this->type = $type;
//        $work = WxWork::where('roomid', $data['roomid'])->first();
//        if ($work) {
//            if ($work->photo){
//                $this->downPhoto();
//            }
//            if ($work->chat){
//                $this->saveMessage();
//            }
//        }
    }

    /*
     * 入口文件
     */
    public static function handle($data)
    {
        $type = $data['message_type'];
        try {


        } catch (\Exception $e) {
            QyWechatData::send_text_msg(self::getToUser($data), $e->getMessage());
        }
    }
    public function saveMessage()
    {

    }

    public function downPhoto()
    {

    }

    /**
     * 判断是否为群聊消息
     * @param $data
     * @return mixed
     */
    public static function getToUser($data)
    {
//        $data = json_decode($data, true);
//    如果变量    $data['conversation_id'] 内包含 "R:" 则为群聊消息
        if (strpos($data['conversation_id'], 'S:') !== false) {
            return $data['conversation_id'];
        } else {
            return $data['receiver'];
        }
    }

}
