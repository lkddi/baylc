<?php

namespace App\Services;


use App\Coco\CocoException;
use App\Models\GroupInfo;
use App\Servers\Runserver;
use App\Services\Rabbitmq\RabbitmqServer;
use Exception;
use Http;
use Log;

class QyWechatData
{

    /**
     * @throws Exception
     */


    /**
     * 发送文字消息(好友或者群)
     *
     * @param string $to_wxid 对方的id，可以是群或者好友id
     * @param string $msg 消息内容
     * @return string json_string
     */
    public static function send_text_msg($to_wxid, $msg)
    {
// 封装返回数据结构
        $data = array();
        $data['client_id'] = 1;
        $data['message_type'] = 11154;             // Api数值（可以参考 - api列表demo）
        $data['params'] = [
            'conversation_id' => $to_wxid,
            'content' => $msg,
        ];
        self::send_work_msg($msg);
        self::send_iyuu($msg);
//        $mq =new RabbitmqServer();
//        $mq->send($data);
//        Log::info($data);
//        $response = array('data' => json_encode($data,JSON_UNESCAPED_UNICODE));
        // 调用Api组件
//        return self::sendSGHttp($data, 'post');
    }

    public static function send_work_join($url)
    {
        $data = array();
        $data['client_id'] = 1;
        $data['message_type'] = 11080;
        $data['params'] = [
            'invite_url' => $url,
        ];
        $mq =new RabbitmqServer();
        $mq->send($data);
    }

    public static function send_work_add_friend($user_id, $corp_id)
    {
        $data = array();
        $data['client_id'] = 1;
        $data['message_type'] = 11064;
        $data['params'] = [
            'user_id' => $user_id,
            'corp_id' => $corp_id,
        ];
        $mq =new RabbitmqServer();
        $mq->send($data);
    }
    /**
     * 下载图片
     *
     * @param array $msg 图片信息
     * @return string json_string
     */
    public static function down_img($msg)
    {
        // 封装返回数据结构
        $data = array();
        $data['client_id'] = 1;
        $data['message_type'] = 11171;             // Api数值（可以参考 - api列表demo）
        $data['params'] = [
            'aes_key' => $msg['cdn']['aes_key'],
            'auth_key' => $msg['cdn']['auth_key'],
            'size' => $msg['cdn']['size'],
            'url' => $msg['cdn']['url'],
            'save_path' => $msg['save_path'],
        ];
        return self::sendSGHttp($data, 'post');
    }

    public static function send_room($roomid,)
    {
        // 封装返回数据结构
        $data = array();
        $data['client_id'] = 1;
        $data['message_type'] = 11134;
        $data['params'] = [
            "room_conversation_id" => $roomid,
        ];
        return self::sendSGHttp($data, 'post');

    }

    public static function send($type, $datas)
    {
        // 封装返回数据结构
        $data = array();
        $data['client_id'] = 1;
        $data['message_type'] = $type;
        $data['params'] = $datas;
        return self::sendSGHttp($data, 'post');

    }

    /**
     * 执行一个 HTTP 请求，仅仅是post组件，其他语言请自行替换即可
     *
     * @param mixed $datas 表单参数
     * @param int $timeout 超时时间
     * @return array  结果数组
     */
    public static function sendSGHttp($datas, $method = 'get', $timeout = 3)
    {
        $url = 'http://10.0.0.85:8080/api_send_message';
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);//post提交方式
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($datas));//设置传送的参数
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//要求结果为字符串且输出到屏幕上
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);//设置等待时间
        $res = curl_exec($curl);//运行curl
        $err = curl_error($curl);
//        Log::info($res);
        if (false === $res || !empty($err)) {
            $Errno = curl_errno($curl);
            $Info = curl_getinfo($curl);
            curl_close($curl);
            //print_r($Info);
            return $err . ' result: ' . $res . 'error_msg: ' . $Errno;
        }
        curl_close($curl);//关闭curl
        return $res;
    }

    public static function send_iyuu($text, $dest = null)
    {
        $url = 'https://iyuu.cn/IYUU38224Tb93f646871572f33ab03859063db6b03f5609534.send';
        $data = array();
        $data['text'] = $text;
        $data['dest'] = $dest;
        $response = Http::get($url, $data);
    }

    public static function send_work_msg($msg)
    {
        $url = 'https://qyapi.weixin.qq.com/cgi-bin/webhook/send?key=f36fc141-7a0f-43a0-84b8-234c937d1c84';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, [
            'msgtype' => 'text',
            'text' => [
                'content' => $msg
            ],
        ]);

        if ($response->successful()) {
            return response()->json(['message' => 'Message sent successfully!']);
        } else {
            return response()->json(['error' => 'Failed to send message.'], $response->status());
        }
    }
}
