<?php


namespace App\Wechats;


class ApiServer
{

    public $API_URL ='http://10.10.10.168:8090';

    public function __construct()
    {
//        $this->API_URL = $API_URL;
//        $this->API_URL = Config('wechatapi');
    }

    /**
     * 发送文本消息 robot_wxid to_wxid(群/好友) msg
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
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 发送图片消息 robot_wxid to_wxid(群/好友) msg(name[md5值或其他唯一的名字，包含扩展名例如1.jpg], url)
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @param $url
     * @return array|string|null
     */
    public static function SendImageMsg($robot_wxid, $to_wxid, $msg, $url)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['msg'] = $msg;
        $data['url'] = $url;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 发送视频消息 robot_wxid to_wxid(群/好友) msg(name[md5值或其他唯一的名字，包含扩展名例如1.mp4], url)
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @param $url
     * @return array|string|null
     */
    public static function SendVideoMsg($robot_wxid, $to_wxid, $msg, $url)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['msg'] = $msg;
        $data['url'] = $url;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 发送文件消息 robot_wxid to_wxid(群/好友) msg(name[md5值或其他唯一的名字，包含扩展名例如1.txt], url)
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @param $url
     * @return array|string|null
     */
    public static function SendFileMsg($robot_wxid, $to_wxid, $msg, $url)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['msg'] = $msg;
        $data['url'] = $url;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 发送群消息并艾特(4.4只能艾特一人) robot_wxid, group_wxid, member_wxid, member_name, msg
     * @param $robot_wxid
     * @param $group_wxid
     * @param $member_wxid
     * @param $member_name
     * @param $msg
     * @return array|string|null
     */
    public static function SendGroupMsgAndAt($robot_wxid, $group_wxid, $member_wxid, $member_name ,$msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['member_wxid'] = $member_wxid;
        $data['member_name'] = $member_name;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 发送动态表情 robot_wxid to_wxid(群/好友) msg(name[md5值或其他唯一的名字，包含扩展名例如1.gif], url)
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @return array|string|null
     */
    public static function SendEmojiMsg($robot_wxid, $to_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 发送分享链接 robot_wxid, to_wxid(群/好友), msg(title, text, target_url, pic_url, icon_url)
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @return array|string|null
     */
    public static function SendLinkMsg($robot_wxid, $to_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 发送音乐分享 robot_wxid, to_wxid(群/好友), msg(music_name, type)
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @return array|string|null
     */
    public static function SendMusicMsg($robot_wxid, $to_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 取登录账号昵称 robot_wxid
     * @param $robot_wxid
     * @return array|string|null
     */
    public static function GetRobotName($robot_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 取登录账号头像 robot_wxid
     * @param $robot_wxid
     * @return array|string|null
     */
    public static function GetRobotHeadimgurl($robot_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }


    /**
     * 取登录账号列表 不需要参数
     * @return array|string|null
     */
    public static function GetLoggedAccountList()
    {
        $data = [];
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 取好友列表 robot_wxid(不传该值，返回全部账号的好友列表)
     * @param $robot_wxid
     * @return array|string|null
     */
    public static function GetFriendList($robot_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 取群聊列表 robot_wxid(不传返回全部机器人的)
     * @param $robot_wxid
     * @return array|string|null
     */
    public static function GetGroupList($robot_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 取群成员列表
     * @param $robot_wxid
     * @param $group_wxid
     * @return array|string|null
     */
    public static function GetGroupMemberList($robot_wxid, $group_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 取群成员详细
     * @param $robot_wxid
     * @param $group_wxid
     * @param $member_wxid
     * @return array|string|null
     */
    public static function GetGroupMemberInfo($robot_wxid, $group_wxid, $member_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['member_wxid'] = $member_wxid;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 接收好友转账
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @return array|string|null
     */
    public static function AcceptTransfer($robot_wxid, $to_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }
    /**
     * 同意群聊邀请
     * @param $robot_wxid
     * @param $msg
     * @return array|string|null
     */
    public static function AgreeGroupInvite($robot_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }
    /**
     * 同意好友请求
     * @param $robot_wxid
     * @param $msg
     * @return array|string|null
     */
    public static function AgreeFriendVerify($robot_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }
    /**
     * 修改好友备注
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @return array|string|null
     */
    public static function EditFriendNote($robot_wxid, $to_wxid,$msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }
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
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 取插件信息 无参数
     * @return array|string|null
     */
    public static function GetappInfo()
    {
        $data = [];
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 取应用目录 无
     * 测试发现可爱猫能取到，但是扔进返回数据里会消失，传不出来
     * @return array|string|null
     */
    public static function GetAppDir()
    {
        $data = [];
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 添加日志
     * @param $msg
     * @return array|string|null
     */
    public static function AddAppLogs($msg)
    {
        $data = [];
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 重载插件
     * @return array|string|null
     */
    public static function ReloadApp()
    {
        $data = [];
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

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
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 修改群名称
     * @param $robot_wxid
     * @param $group_wxid
     * @param $msg
     * @return array|string|null
     */
    public static function EditGroupName($robot_wxid, $group_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 修改群公告
     * @param $robot_wxid
     * @param $group_wxid
     * @param $msg
     * @return array|string|null
     */
    public static function EditGroupNotice($robot_wxid, $group_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 建立新群 robot_wxid, msg(好友Id用”|”分割)
     * 测试发现可爱猫执行成功，但是没见群在哪。。。你们自测！
     * @param $robot_wxid
     * @param $msg
     * @return array|string|null
     */
    public static function BuildNewGroup($robot_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }

    /**
     * 退出群聊,我测试发现没退出来，也可能可爱猫没实现吧 你们自测
     * @param $robot_wxid
     * @param $group_wxid
     * @return array|string|null
     */
    public static function QuitGroup($robot_wxid, $group_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');    }


    /**
     * 邀请加入群聊
     * @param $robot_wxid
     * @param $group_wxid
     * @param $to_wxid
     * @return array|string|null
     */
    public static function InviteInGroup($robot_wxid, $group_wxid, $to_wxid)
    {
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['to_wxid'] = to_wxid;
        $data['event'] = __FUNCTION__;
        $url = (new self())->API_URL;
        return self::sendSGHttp($url, $data,'post');
    }

    /**
     * 执行一个 HTTP 请求，仅仅是post组件，其他语言请自行替换即可
     *
     * @param  string $url 执行请求的url地址
     * @param  mixed  $params  表单参数
     * @param  int    $timeout 超时时间
     * @param  string $method  请求方法 post / get
     * @return array  结果数组
     */
    public static function sendSGHttp($url, $params, $method = 'get', $timeout = 3)
    {
        if (null == $url) return null;
        $curl = curl_init();
        if ('get' == $method) {//以GET方式发送请求
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

        if (false === $res || !empty($err)) {
            $Errno = curl_errno($curl);
            $Info = curl_getinfo($curl);
            curl_close($curl);
            return $err. ' result: ' . $res . 'error_msg: '.$Errno;
        }
        curl_close($curl);//关闭curl
        return $res;
    }

}
