<?php

namespace App\Wechats;

class WxReturn
{
    /**
     * 发送文本消息 robot_wxid to_wxid(群/好友) msg
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function SendTextMsg($robot_wxid, $to_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 发送图片消息 robot_wxid to_wxid(群/好友) msg(name[md5值或其他唯一的名字，包含扩展名例如1.jpg], url)
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @param $url
     * @return \Illuminate\Http\JsonResponse
     */
    public function SendImageMsg($robot_wxid, $to_wxid, $msg, $url)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['msg'] = $msg;
        $data['url'] = $url;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 发送视频消息 robot_wxid to_wxid(群/好友) msg(name[md5值或其他唯一的名字，包含扩展名例如1.mp4], url)
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @param $url
     * @return \Illuminate\Http\JsonResponse
     */
    public function SendVideoMsg($robot_wxid, $to_wxid, $msg, $url)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['msg'] = $msg;
        $data['url'] = $url;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 发送文件消息 robot_wxid to_wxid(群/好友) msg(name[md5值或其他唯一的名字，包含扩展名例如1.txt], url)
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @param $url
     * @return \Illuminate\Http\JsonResponse
     */
    public function SendFileMsg($robot_wxid, $to_wxid, $msg, $url)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['msg'] = $msg;
        $data['url'] = $url;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 发送群消息并艾特(4.4只能艾特一人) robot_wxid, group_wxid, member_wxid, member_name, msg
     * @param $robot_wxid
     * @param $group_wxid
     * @param $member_wxid
     * @param $member_name
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function SendGroupMsgAndAt($robot_wxid, $group_wxid, $member_wxid, $member_name ,$msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['member_wxid'] = $member_wxid;
        $data['member_name'] = $member_name;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 发送动态表情 robot_wxid to_wxid(群/好友) msg(name[md5值或其他唯一的名字，包含扩展名例如1.gif], url)
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function SendEmojiMsg($robot_wxid, $to_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 发送分享链接 robot_wxid, to_wxid(群/好友), msg(title, text, target_url, pic_url, icon_url)
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function SendLinkMsg($robot_wxid, $to_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 发送音乐分享 robot_wxid, to_wxid(群/好友), msg(music_name, type)
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function SendMusicMsg($robot_wxid, $to_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 取登录账号昵称 robot_wxid
     * @param $robot_wxid
     * @return \Illuminate\Http\JsonResponse
     */
    public function GetRobotName($robot_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 取登录账号头像 robot_wxid
     * @param $robot_wxid
     * @return \Illuminate\Http\JsonResponse
     */
    public function GetRobotHeadimgurl($robot_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }


    /**
     * 取登录账号列表 不需要参数
     * @return \Illuminate\Http\JsonResponse
     */
    public function GetLoggedAccountList()
    {
        $data = [];
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 取好友列表 robot_wxid(不传该值，返回全部账号的好友列表)
     * @param $robot_wxid
     * @return \Illuminate\Http\JsonResponse
     */
    public function GetFriendList($robot_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 取群聊列表 robot_wxid(不传返回全部机器人的)
     * @param $robot_wxid
     * @return \Illuminate\Http\JsonResponse
     */
    public function GetGroupList($robot_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 取群成员列表
     * @param $robot_wxid
     * @param $group_wxid
     * @return \Illuminate\Http\JsonResponse
     */
    public function GetGroupMemberList($robot_wxid, $group_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 取群成员详细
     * @param $robot_wxid
     * @param $group_wxid
     * @param $member_wxid
     * @return \Illuminate\Http\JsonResponse
     */
    public function GetGroupMemberInfo($robot_wxid, $group_wxid, $member_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['member_wxid'] = $member_wxid;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 接收好友转账
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function AcceptTransfer($robot_wxid, $to_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }
    /**
     * 同意群聊邀请
     * @param $robot_wxid
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function AgreeGroupInvite($robot_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }
    /**
     * 同意好友请求
     * @param $robot_wxid
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function AgreeFriendVerify($robot_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }
    /**
     * 修改好友备注
     * @param $robot_wxid
     * @param $to_wxid
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function EditFriendNote($robot_wxid, $to_wxid,$msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
}
    /**
     * 删除好友
     * @param $robot_wxid
     * @param $to_wxid
     * @return \Illuminate\Http\JsonResponse
     */
    public function DeleteFriend($robot_wxid, $to_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['to_wxid'] = $to_wxid;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 取插件信息 无参数
     * @return \Illuminate\Http\JsonResponse
     */
    public function GetappInfo()
    {
        $data = [];
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 取应用目录 无
     * 测试发现可爱猫能取到，但是扔进返回数据里会消失，传不出来
     * @return \Illuminate\Http\JsonResponse
     */
    public function GetAppDir()
    {
        $data = [];
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 添加日志
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function AddAppLogs($msg)
    {
        $data = [];
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 重载插件
     * @return \Illuminate\Http\JsonResponse
     */
    public function ReloadApp()
    {
        $data = [];
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 踢出群成员
     * @param $robot_wxid
     * @param $group_wxid
     * @param $member_wxid
     * @return \Illuminate\Http\JsonResponse
     */
    public function RemoveGroupMember($robot_wxid, $group_wxid, $member_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['member_wxid'] = $member_wxid;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 修改群名称
     * @param $robot_wxid
     * @param $group_wxid
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function EditGroupName($robot_wxid, $group_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 修改群公告
     * @param $robot_wxid
     * @param $group_wxid
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function EditGroupNotice($robot_wxid, $group_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 建立新群 robot_wxid, msg(好友Id用”|”分割)
     * 测试发现可爱猫执行成功，但是没见群在哪。。。你们自测！
     * @param $robot_wxid
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function BuildNewGroup($robot_wxid, $msg)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['msg'] = $msg;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    /**
     * 退出群聊,我测试发现没退出来，也可能可爱猫没实现吧 你们自测
     * @param $robot_wxid
     * @param $group_wxid
     * @return \Illuminate\Http\JsonResponse
     */
    public function QuitGroup($robot_wxid, $group_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }


    /**
     * 邀请加入群聊
     * @param $robot_wxid
     * @param $group_wxid
     * @param $to_wxid
     * @return \Illuminate\Http\JsonResponse
     */
    public function InviteInGroup($robot_wxid, $group_wxid, $to_wxid)
    {
        $data = [];
        $data['robot_wxid'] = $robot_wxid;
        $data['group_wxid'] = $group_wxid;
        $data['to_wxid'] = to_wxid;
        $data['event'] = __FUNCTION__;
        return $this->back($data);
    }

    public function back($data)
    {
        $datas = [
            "success" => true,//true时，http-sdk才处理，false直接丢弃
            "message" => "successful!",
        ];
        return response()->json(array_merge($datas, $data));
    }
}
