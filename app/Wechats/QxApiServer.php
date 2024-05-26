<?php


namespace App\Wechats;


use App\Models\WxBot;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Null_;

class QxApiServer
{

    /**
     * 获取登录账号列表（该命令供商业版调用）
     * @return array|string|null
     */
    public static function GetRobotList()
    {
        $data = [];
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 发送文本消息
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @return array|string|null
     */
    public static function SendTextMsg($robot_wxid, $to_wxid, $msg)
    {
        $data = [];
        $data['type'] = 'Q0001';
        $data['data'] = [
            'wxid' => $to_wxid,
            'msg' => $msg
        ];
        return self::sendSGHttp($data, $robot_wxid);
    }

    /**
     * 执行一个 HTTP 请求，仅仅是post组件，其他语言请自行替换即可
     *
     * @param string $url 执行请求的url地址
     * @param mixed $params 表单参数
     * @param int $timeout 超时时间
     * @param string $method 请求方法 post / get
     * @return array  结果数组
     */
    public static function sendSGHttp($params, $robot_wxid = NULL, $method = 'post', $timeout = 3)
    {
        $bot = WxBot::where('wxid', $robot_wxid)->first();
        if ($bot) {
            $url = $bot['apiurl'].$robot_wxid;
        }

        \Log::info($params);
        if ($url == null) return null;
        $curl = curl_init();
        if ($method == 'get') {//以GET方式发送请求
            curl_setopt($curl, CURLOPT_URL, $url);
        } else {//以POST方式发送请求
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, 1);//post提交方式
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));//设置传送的参数
        }

        curl_setopt($curl, CURLOPT_HEADER, false);//设置header
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//要求结果为字符串且输出到屏幕上
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);//设置等待时间

        $res = curl_exec($curl);//运行curl
        $err = curl_error($curl);

        if ($res === false || !empty($err)) {
            $Errno = curl_errno($curl);
            $Info = curl_getinfo($curl);
            curl_close($curl);
            return $err . ' result: ' . $res . 'error_msg: ' . $Errno;
        }
        curl_close($curl);//关闭curl
        return $res;
    }

    /**
     * 执行一个 HTTP 请求，仅仅是post组件，其他语言请自行替换即可
     *
     * @param string $url 执行请求的url地址
     * @param mixed $params 表单参数
     * @param int $timeout 超时时间
     * @param string $method 请求方法 post / get
     * @return array  结果数组
     */
    public static function sendSGHttpx($params, $robot_wxid = NULL, $method = 'post', $timeout = 3)
    {
//        $robot_wxid = $robot_wxid=='' ?? $params['robot_wxid'];
        if (isset($robot_wxid)) {
            $robot_wxid = $robot_wxid;
        } else {
            $robot_wxid = $params['robot_wxid'];
        }
        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/qxapi.log'),
        ])->info($params);
        $bot = WxBot::where('wxid', $robot_wxid)->first();
        if ($bot) {
            $params['token'] = $bot['token'];
            $url = $bot['apiurl'];
        }
        if ($url == null) return null;
        $curl = curl_init();
        if ($method == 'get') {//以GET方式发送请求
            $url .= '?' . http_build_query($params);
            curl_setopt($curl, CURLOPT_URL, $url);
        } else {//以POST方式发送请求

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, 1);//post提交方式
            curl_setopt($curl, CURLOPT_POSTFIELDS, $params);//设置传送的参数
        }

        curl_setopt($curl, CURLOPT_HEADER, false);//设置header
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//要求结果为字符串且输出到屏幕上
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);//设置等待时间

        $res = curl_exec($curl);//运行curl
        $err = curl_error($curl);

        if ($res === false || !empty($err)) {
            $Errno = curl_errno($curl);
            $Info = curl_getinfo($curl);
            curl_close($curl);
            return $err . ' result: ' . $res . 'error_msg: ' . $Errno;
        }
        curl_close($curl);//关闭curl
        return $res;
    }
}
