<?php


namespace App\Services;

use App\Models\WxWork;
use App\Services\WorkWechat\GroupMessageHandler;
use App\Services\WorkWechat\ImageMessageHandler;
use App\Services\WorkWechat\MessageHandlerInterface;
use App\Services\WorkWechat\OtherMessageHandler;
use App\Services\WorkWechat\PersonalMessageHandler;
use App\Services\WorkWechat\UserListMessageHandler;
use Exception;

// 导入其他消息处理类

class MessageHandlerFactory
{
    public static function createHandler($type): MessageHandlerInterface
    {
        try {
            switch ($type) {
                case '11049'://红包消息解析
                    return new GroupMessageHandler();
                case '11042':
                    return new ImageMessageHandler();
                // 为其他消息类型添加 case 分支
                case '11041'://文本消息
                    return new PersonalMessageHandler();
                case '11037':
                    return new UserListMessageHandler();
                case '11036'://群列表
                    return new UserListMessageHandler();
                default:
                    //找不到的 都归总的其他消息进行处理
                    return new OtherMessageHandler();
            }
        } catch (Exception $e) {
            throw $e;
        }
    }


}
