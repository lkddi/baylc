<?php

namespace App\Services\WorkWechat;

use App\Exceptions\WokeException;
use App\Models\WxGroup;
use App\Models\WxWork;
use App\Services\WeChatFerry\AddSale;
use Exception;
use Log;

class GroupMessageHandler implements MessageHandlerInterface
{
    /**
     * 群消息处理器
     * @param $message
     * @return string
     *
     * @throws \Exception
     */
    public function handle($message)
    {

        $message_data = $message['message_data'];
        try {
            $group = WxWork::where('roomid', $message['message_data']['conversation_id'])->first();
            // 判断是否开启记录销售
            if ($group && $group->isadd) {
                // 判断是否是销售登记
//                if (strpos($message_data['desc'], '来自松下董冬明') !== false) {
                $remarkParts = explode(' ', $message['message_data']['remark']);
                if (count($remarkParts) >= 3) {
                    $num = isset($remarkParts[3]) && $remarkParts[3] !== '' ? $remarkParts[3] : 1;
                    AddSale::AddSale($message);
                }
//                }
            }
            // 处理群消息的逻辑


        } catch (WokeException $e) {
            throw $e;
        }
        // 处理文本消息的逻辑

    }
}
