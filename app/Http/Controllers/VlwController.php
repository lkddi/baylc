<?php

namespace App\Http\Controllers;

use App\Models\WxBot;
use App\Services\WxBotServices;
use App\Wechats\EventFrieneVerify;
use App\Wechats\EventGroupMsg;
use App\Wechats\EventGroupNameChange;
use App\Wechats\EventInvitedInGroup;
use App\Wechats\EventPrivateChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VlwController extends Controller
{
    //VLW微信机器人框架
    //http://a.vlmai.cn/

    public function index(Request $request)
    {
//        Log::info('web 接口访问');
//        Log::info($request->all());
    }

    /*
     * 微信机器人 消息处理
     */
    public function api(Request $request)
    {
        $data = $request->get('content');
        $data['sdkVer'] = $request->get('sdkVer');
        $data['Event'] = $request->get('Event');
//        Log::info($request->all());
        $event = $request->get('Event');
        $q = ['Code' => -1];
        if (isset($event)) {
            switch ($event) {
                case 'Login'://新的账号登录成功/下线
                    (new \App\Services\WxBotServices)->addBot($data);
                    return $q;
                case 'EventGroupChat'://群消息事件
                    EventGroupMsg::msg($data);
                    return $q;
                case 'EventPrivateChat'://私聊消息事件
                    return EventPrivateChat::run($data);
                case 'EventGroupMemberAdd'://群成员增加事件（新人进群）

                    break;
                case 'EventGroupNameChange'://群名称变动事件
                    return EventGroupNameChange::update($data);
                case 'EventGroupMemberDecrease'://群成员减少事件（群成员退出）
//                    return WxUserServer::delGroupUser($data);
                    break;
                case 'EventInvitedInGroup'://被邀请入群事件
                    EventInvitedInGroup::run($data);
                    return $q;
                case 'EventQRcodePayment'://面对面收款（二维码收款时，运行这里）
                    break;
                case 'EventFrieneVerify'://好友请求事件
                    EventFrieneVerify::run($data);
                    return $q;
                case 'EventDownloadFile'://文件下载结束事件
                    break;
                case 'EventDeviceCallback':
                    break;
                default:
                    Log::info('收到未识别消息');
            }
        }
        return ['Code' => -1];
    }

}
