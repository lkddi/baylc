<?php

namespace App\Listeners;

use App\Events\AddMsgEvent;
use App\Events\FinanceEvent;
use App\Facades\ApiGateway;
use App\Models\WxGroup;
use App\Models\WxUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Event;
use Log;

class AddMsgEventListener
{

    /**
     * 处理 文本消息
     */
    public function handle(AddMsgEvent $event)
    {
        $message = $event->data;
        $wxid = $message['Data']['FromUserName']['string'];
        // 机器人自己发的消息 忽略处理
        if ($wxid == $message['Wxid']) {
            return;
        }
//        Log::channel('gewe_daily')->info('dddddddd');

        $this->checkUser($message);

//        Log::channel('gewe_daily')->info($message);

        switch ($message['Data']['MsgType']) {
            case 49:
                Event::dispatch(new FinanceEvent($message));
                break;
//            case 1:
//                $this->message($message);
//                break;
        }
    }

    public function checkUser($event)
    {
        $wxid = $event['Data']['FromUserName']['string'];
        if (strpos($event['Data']['FromUserName']['string'], '@chatroom') !== false) {
            $content = $event['Data']['Content']['string'];
            // 获取消息内容 剔除用户wxid
            $Content = preg_replace('/^[^:\n]*[:\n]\s*/', '', $content);
            $group = WxGroup::where('wxid', $wxid)
                ->where('robot_wxid', $event['Wxid'])
                ->first();
            if ($group) {
                if ($group->user) {
                    if (preg_match('/^[^:]+/', $content, $matches)) {
                        $result = $matches[0];
//                        echo $result;
                    }
                    $user = $event['Data']['PushContent'];
                    $this->addUser($matches[0], $group, extractContentUser($user));
                }
                // 有企业用户 则为企业微信群
                if (strpos($content, '@openim') !== false && !$group->robot_type) {
                    $group->robot_type = 1;
                    $group->save();
                }
            } else {
                // 使用正则表达式匹配第一个冒号前的内容
                $this->addGroup($wxid, $event['Wxid']);
            }

        } else {
            $Content = $event['Data']['Content']['string'];
//            $this->addUser($wxid);
        }

        $to = $event['Data']['FromUserName']['string'];

        if ($Content == '12321') {
            ApiGateway::postText($event['Appid'], $to, '我在呢！Gewechat');
        }
    }

    public function addUser($wxid, $group, $nickname)
    {

        $group->users()->updateOrCreate([
            'wxid' => $wxid,
//            'zt_company_id' =>$group->zt_company_id
        ], [
            'nickname' => $nickname
        ]);
    }

    public function addGroup($group, $robot_wxid)
    {
        WxGroup::updateOrCreate([
            'wxid' => $group,
            'robot_wxid' => $robot_wxid,
        ]);
    }

}
