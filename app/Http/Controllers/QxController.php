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

class QxController extends Controller
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
        $req = $request->get('data');
        $event = $request->get('event');
//        $data['sdkVer'] = $request->get('sdkVer');
        $data['robot_wxid'] = $request->get('wxid');
//        $data['from_group_name'] = '';//群名
//        $data['from_name'] = '';//群名
        $data['msg'] = $req['data']['msg'];//
        $data['type'] = $req['data']['msgType'];
        $data['sdkVer'] = 'v6';

        //1/文本消息 3/图片消息 34/语音消息  42/名片消息  43/视频 47/动态表情 48/地理位置  49/分享链接  2001/红包  2002/小程序  2003/群邀请 更多请参考常量表


        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/qx.log'),
        ])->info($request->all());

        $q = ['Code' => -1];
        if (isset($event)) {
            switch ($event) {
                case 'Login'://新的账号登录成功/下线
                    (new \App\Services\WxBotServices)->addBot($data);
                    return $q;
                case '10008'://群消息事件
                    $data['from_group'] = $req['data']['fromWxid']; //群id
                    $data['from_wxid'] = $req['data']['finalFromWxid'];//群名
                    $data['Event'] = 'EventGroupChat';
                    EventGroupMsg::msg($data);
                    return $q;
                case '10009'://私聊消息事件
//                    $data['Event'] = 'EventPrivateChat';
                    $data['from_wxid'] = $req['data']['fromWxid'];//群id
                    Log::info($data);
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
                case 'EventQRcodePayment'://面对面收款（二维码收款时，运行这里）10007
                    break;
                case 'EventFrieneVerify'://好友请求事件  10011
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
