<?php

namespace App\Services\WorkWechat;

use App\Models\WxWork;
use App\Services\WeChatFerry\AddSale;
use Exception;
use Log;
use Str;

class PersonalMessageHandler implements MessageHandlerInterface
{
    /**
     * 个人消息处理器
     * @param $message
     * @return false|void
     * @throws Exception
     */
    public function handle($message)
    {
        if (!isset($message['message_data'])) return false;
        try {
            $message_data = $message['message_data'];
            $content = $message_data['content'];

            // 群消息处理
            if (IfRoomid($message_data)) {
                $group = WxWork::where('roomid', $message_data['conversation_id'])->first();
                if (!$group) {
                    $work = new WxWork();
                    $work->roomid = $message_data['conversation_id'];
                    $work->save();
                }elseif ($group['isadd']) {
                    if (Str::contains($content, '增加')) {
                        $title = str_replace('增加 ', '', $content);
                        $x = explode(' ', $title);
                        if (count($x) >= 3) {
                            AddSale::AddSale($message_data['conversation_id'], $x[0], $x[1], $x[2], $x[3] ?? 1);
                        }
                    }
                }
            }

            if ($content == '123') {
                echo '收到主人问话: ' . $content . "\n";
                throw new Exception('亲爱的主人我在!');
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

}
