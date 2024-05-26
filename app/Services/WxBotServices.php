<?php

namespace App\Services;

use App\Models\WxBot;
use App\Wechats\VlwApiServer;

class WxBotServices
{
    public function createUser($params)
    {
        WxBot::updateOrCreate(
            ['wxid' => $params['Wxid'], 'robot_type' => $params['robot_type']],
            [
                'online' => 1,
                'username' => $params['username'],
                'wx_num' => $params['wx_num'],
                'wx_headimgurl' => $params['wx_headimgurl'],
                'robot_type' => $params['Enterprise wechat'],
                'open' => 1
            ]
        );
    }

    /**
     * 新机器人保存到数据库
     * @param $data
     * @return void
     */
    public function addBot($data)
    {
        $bot = WxBot::where('Wxid', $data['Wxid'])->first();
        if ($bot) {
            $bot->online = $data['type'] == 0 ? 1 : 0;
            $bot->save();
        } else {
            $this->GetRobotList();
        }
    }

    public function GetRobotList()
    {
        $bot = VlwApiServer::GetRobotList();
        $r = json_decode($bot, true);
        if (!$r['Code'] && is_array($r['ReturnJson']['data'])) {
            foreach ($r['ReturnJson']['data'] as $u) {
                $this->createUser($u);
            }
        }

    }


}
