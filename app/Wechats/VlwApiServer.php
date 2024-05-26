<?php


namespace App\Wechats;


use App\Models\WxBot;
use phpDocumentor\Reflection\Types\Null_;

class VlwApiServer
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
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['msg'] = $msg;
        $data['api'] = __FUNCTION__;
//        \Log::info($data);
        return self::sendSGHttp($data);
    }

    /**
     * 发送图片消息
     * @param $robot_wxid
     * @param $to_wxid
     * @param $path //本地图片文件的绝对路径 或 网络图片url 或 图片base64编码
     * @return array|string|null
     */
    public static function SendImageMsg($robot_wxid, $to_wxid, $path)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['path'] = $path;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttpx($data, 'get');
    }

    /**
     * 发送视频消息 robot_wxid to_wxid(群/好友) msg(name[md5值或其他唯一的名字，包含扩展名例如1.mp4], url)
     * @param $robot_wxid
     * @param $to_wxid
     * @param $path //机器人本地视频文件（xxxxx.mp4）的绝对路径
     * @return array|string|null
     */
    public static function SendVideoMsg($robot_wxid, $to_wxid, $path)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data, 'post');
    }

    /**
     * 发送文件消息
     * @param $robot_wxid
     * @param $to_wxid
     * @param $path //机器人本地文件的绝对路径
     * @return array|string|null
     */
    public static function SendFileMsg($robot_wxid, $to_wxid, $path)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['path'] = $path;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data, 'post');
    }

    /**
     * 发送群消息并艾特(4.4只能艾特一人) robot_wxid, group_wxid, member_wxid, member_name, msg
     * @param $robot_wxid
     * @param $group_wxid
     * @param $member_wxid
     * @param $member_name
     * @param $msg
     * @return array|string|null
     */
    public static function SendGroupMsgAndAt($robot_wxid, $group_wxid, $member_wxid, $member_name, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['member_wxid'] = $member_wxid;
        $data['member_name'] = $member_name;
        $data['msg'] = $msg;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data, 'post');
    }

    /**
     * 发送名片消息
     * @param $robot_wxid //机器人ID
     * @param $to_wxid //对方的ID（支持好友/群ID/公众号ID）
     * @param $content //朋友ID
     * @return array|string|null
     */
    public static function SendCardMsg($robot_wxid, $to_wxid, $content)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['content'] = $content;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data, 'post');
    }

    /**
     * 发送动态表情
     * @param $robot_wxid
     * @param $to_wxid
     * @param $path // 机器人本地动态表情文件（xxxxx.gif）的绝对路径
     * @return array|string|null
     */
    public static function SendEmojiMsg($robot_wxid, $to_wxid, $path)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['path'] = $path;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data, 'post');
    }

    /**
     * 发送链接消息
     * @param $robot_wxid
     * @param $to_wxid
     * @param $xml //xml代码
     * @return array|string|null
     */
    public static function SendLinkMsg($robot_wxid, $to_wxid, $xml)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['xml'] = $xml;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data, 'post');
    }

    /**
     * 发送普通分享链接
     * @param $robot_wxid
     * @param $to_wxid
     * @param $title // 链接标题
     * @param $desc // 链接内容
     * @param $url // 图片地址
     * @param $image_url // 跳转地址
     * @return array|string|null
     */
    public static function SendShareLinkMsg($robot_wxid, $to_wxid, $title, $desc, $url, $image_url)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['title'] = $title;
        $data['desc'] = $desc;
        $data['url'] = $url;
        $data['image_url'] = $image_url;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 发送一条可播放的歌曲链接
     * @param $robot_wxid
     * @param $to_wxid
     * @param $title // 标题
     * @param $desc // 内容
     * @param $url // 链接地址
     * @param $dataurl // mp3地址
     * @param $thumburl // http图片地址
     * @return array|string|null
     */
    public static function SendMusicLinkMsg($robot_wxid, $to_wxid, $title, $desc, $url, $dataurl, $thumburl)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['title'] = $title;
        $data['desc'] = $desc;
        $data['url'] = $url;
        $data['dataurl'] = $dataurl;
        $data['thumburl'] = $thumburl;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 发送小程序消息
     * @param $robot_wxid
     * @param $to_wxid
     * @param $xml //xml代码
     * @return array|string|null
     */
    public static function SendXmlMsg($robot_wxid, $to_wxid, $xml)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['xml'] = $xml;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 取登录账号信息
     * @return array|string|null
     */
    public static function GetRobotInfo()
    {
        $data = [];
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 获取好友列表
     * @param $robot_wxid
     * @param $is_refresh // 1为重刷列表再获取，0为取缓存，默认为0
     * @return array|string|null
     */
    public static function GetFriendList($robot_wxid, $is_refresh)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['is_refresh'] = $is_refresh;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 获取群列表
     * @param $robot_wxid // 机器人ID
     * @param $is_refresh // 1为重刷列表再获取，0为取缓存，默认为0
     * @return array|string|null
     */
    public static function GetGrouplist($robot_wxid, $is_refresh = 1)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['is_refresh'] = $is_refresh;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 取群成员列表
     * @param $robot_wxid
     * @param $group_wxid
     * @param int $is_refresh // 1为重刷列表再获取，0为取缓存，默认为0
     * @return array|string|null
     */
    public static function GetGroupMember($robot_wxid, $group_wxid, int $is_refresh = 1)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['is_refresh'] = $is_refresh;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 取群成员详细
     * @param $robot_wxid
     * @param $group_wxid
     * @param $to_wxid //群成员ID
     * @return array|string|null
     */
    public static function GetGroupcardByWxid($robot_wxid, $group_wxid, $to_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 修改群名称
     * @param $robot_wxid
     * @param $group_wxid
     * @param $group_name // 新的群名称
     * @return array|string|null
     */
    public static function ModifyGroupName($robot_wxid, $group_wxid, $group_name)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['group_name'] = $group_name;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 修改群公告
     * @param $robot_wxid
     * @param $group_wxid
     * @param $Notice
     * @return array|string|null
     */
    public static function ModifyGroupNotice($robot_wxid, $group_wxid, $Notice)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['Notice'] = $Notice;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 同意转账
     * @param $robot_wxid
     * @param $from_wxid
     * @param $payer_pay_id //付款人付款id
     * @param $receiver_pay_id //收款人付款id（转账单号）
     * @param $paysubtype //付款类型
     * @param $money // 金额
     * @return array|string|null
     */
    public static function AccepteTransfer($robot_wxid, $from_wxid, $payer_pay_id, $receiver_pay_id, $paysubtype, $money)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['from_wxid'] = $from_wxid;
        $data['payer_pay_id'] = $payer_pay_id;
        $data['receiver_pay_id'] = $receiver_pay_id;
        $data['paysubtype'] = $paysubtype;
        $data['money'] = $money;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 同意进群
     * @param $robot_wxid
     * @param $from_wxid
     * @param $invite_url //邀请链接
     * @return array|string|null
     */
    public static function AgreeGroupInvite($robot_wxid, $from_wxid, $invite_url)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['from_wxid'] = $from_wxid;
        $data['invite_url'] = $invite_url;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 同意好友请求
     * @param $robot_wxid
     * @param $v1
     * @param $v2
     * @param $type
     * @return array|string|null
     */
    public static function AgreeFriendVerify($robot_wxid, $v1, $v2, $type)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['v1'] = $v1;
        $data['v2'] = $v2;
        $data['type'] = $type;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 修改好友备注
     * @param $robot_wxid
     * @param $to_wxid
     * @param $note
     * @return array|string|null
     */
    public static function ModifyFriendNote($robot_wxid, $to_wxid, $note)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['note'] = $note;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 删除好友
     * @param $robot_wxid
     * @param $to_wxid
     * @return array|string|null
     */
    public static function DeleteFriend($robot_wxid, $to_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data, 'post');
    }

    /**
     * 踢出群成员
     * @param $robot_wxid
     * @param $group_wxid
     * @param $member_wxid
     * @return array|string|null
     */
    public static function RemoveGroupMember($robot_wxid, $group_wxid, $member_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['member_wxid'] = $member_wxid;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 退出群聊
     * @param $robot_wxid 机器人id
     * @param $group_wxid 微信群id
     * @return array|string|null
     */
    public static function QuitGroup($robot_wxid, $group_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 邀请加入群聊
     * @param $robot_wxid
     * @param $group_wxid
     * @param $to_wxid
     * @return array|string|null
     */
    public static function InviteInGroup($robot_wxid, $group_wxid, $to_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
    }

    /**
     * 获取文件 返回该文件的Base64编码
     * @param $path
     * @return array|string|null
     */
    public static function GetFileFoBase64($path, $robot_wxid)
    {
        $data = [];
        $data['path'] = $path;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data, 'post', 3, $robot_wxid);
    }

    /**
     * 下载文件（http/https协议），下载完成时通过EventDownloadFile回调
     * @param $url //文件下载直链，不可重定向，需要保证HEAD访问有返回
     * @param $savePath // 文件保存完整路径，目录不存在时会自动创建（如 E:\file\temp.exe
     * @param $is_refresh // 1为下载或覆盖下载，0为本地存在该文件时不下载（以savePath判断），默认为0
     * @param $useApi // 下载完成 或 本地存在 时 快捷发送，为空则只下载
     * @param $robot_wxid // 机器人ID
     * @param $to_wxid // 对方的ID（支持好友/群ID/公众号ID）
     * @return array|string|null
     */
    public static function DownloadFile($url, $savePath, $is_refresh, $useApi, $robot_wxid, $to_wxid)
    {
        $data = [];
        $data['url'] = $url;
        $data['savePath'] = $savePath;
        $data['is_refresh'] = $is_refresh;
        $data['useApi'] = $useApi;
        $data['to_wxid'] = $to_wxid;
        $data['robot_wxid'] = $robot_wxid;
        $data['api'] = __FUNCTION__;
        return self::sendSGHttp($data);
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
    public static function sendSGHttp($params, $method = 'post', $timeout = 3, $robot_wxid=NULL)
    {
        if ($params['api'] !='GetRobotList'){
            if (isset($robot_wxid)){
                $robot_wxid = $robot_wxid;
            }else{
                $robot_wxid = $params['robot_wxid'];
            }

            $bot = WxBot::where('wxid', $robot_wxid)->first();
            if ($bot) {
                $params['token'] = $bot['token'];
                $url = $bot['apiurl'];
            }
        }else{
            $url = 'http://nas.36y.net:9999';
            $params['token'] = 'ddmabc123';
        }

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
    public static function sendSGHttpx($params, $method = 'post', $timeout = 3, $robot_wxid=NULL)
    {
//        $robot_wxid = $robot_wxid=='' ?? $params['robot_wxid'];
        if (isset($robot_wxid)){
            $robot_wxid = $robot_wxid;
        }else{
            $robot_wxid = $params['robot_wxid'];
        }

        $bot = WxBot::where('wxid', $robot_wxid)->first();
        if ($bot) {
            $params['token'] = $bot['token'];
            $url = $bot['apiurl'];
        }
        if ($url == null) return null;
        $curl = curl_init();
        if ($method == 'get') {//以GET方式发送请求
            $url .= '?'.http_build_query($params);
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
