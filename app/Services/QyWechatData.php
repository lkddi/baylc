<?php

namespace App\Services;


use App\Coco\CocoException;
use App\Models\GroupInfo;
use App\Servers\Runserver;
use Exception;
use Log;

class QyWechatData
{

    /**
     * @throws Exception
     */


//    public function handleType11042($data)
//    {
//        return true;
//    }
//
//    public function handleType11044($data)
//    {
//        return true;
//    }

    // 添加更多处理方法...
//11028   [登录二维码通知.md](登录/登录二维码通知.md)
//11174  [登录二维码状态通知.md](登录/登录二维码状态通知.md)
//11024 [接口就绪通知.md](登录/接口就绪通知.md)
//11179  [用户登录成功通知（含公司名称）.md](登录/用户登录成功通知（含公司名称）.md)
//11026  [用户登录成功通知(无公司名称).md](登录/用户登录成功通知(无公司名称).md)
//11027  [用户退出通知.md](登录/用户退出通知.md)
//#### 好友
//11173  [被删除通知.md](好友/被删除通知.md)
//11077  [好友删除通知.md](好友/好友删除通知.md)
//11063  [好友申请通知.md](好友/好友申请通知.md)
//11076  [好友新增通知.md](好友/好友新增通知.md)
//#### 界面
//11095  [弹窗消息.md](界面/弹窗消息.md)
//##### 群聊
//11073  [群成员减少通知.md](群聊/群成员减少通知.md)
//11072  [群成员增加通知.md](群聊/群成员增加通知.md)
//11078  [群名称变化通知.md](群聊/群名称变化通知.md)
//11074  [新增群通知.md](群聊/新增群通知.md)
//11075  [主动退群通知.md](群聊/主动退群通知.md)
//##### 消息
//11123  [撤回消息通知.md](消息/撤回消息通知.md)
//11049 [红包消息.md](消息/红包消息.md)
//11047 [链接消息.md](消息/链接消息.md)
//11050 [名片消息.md](消息/名片消息.md)
//11124 [视频号消息.md](消息/视频号消息.md)
//11043  [视频消息.md](消息/视频消息.md)
//11042  [图片消息.md](消息/图片消息.md)
//11068  [图文消息.md](消息/图文消息.md)
//11046 [位置消息.md](消息/位置消息.md)
//11041  [文本消息.md](消息/文本消息.md)
//11045  [文件消息.md](消息/文件消息.md)
//11066  [小程序消息.md](消息/小程序消息.md)
//11044  [语音消息.md](消息/语音消息.md)
//11048  [GIF消息.md](消息/GIF消息.md)
//11051 未知
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
        echo $to_wxid . "\n";
//        Log::info($data);
//        $response = array('data' => json_encode($data,JSON_UNESCAPED_UNICODE));
        // 调用Api组件
        return self::sendSGHttp($data, 'post');
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
}
