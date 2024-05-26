<?php

namespace App\Http\Controllers;

use App\Models\WxZhuanfa;
use App\Wechats\VlwApiServer;

class QunZhuanfa extends Controller
{
    // 转发调用接口

    public function zhuanfa()
    {
        $msgs = WxZhuanfa::where('state', 1)
            ->where('start', 1)
            ->get();
        if ($msgs){
            foreach ($msgs as $msg){
                $req = self::send($msg);
                $s =json_decode($req,true);
                if ($s['Code'] ==0 && $s['Result']=='OK'){
                    $f = WxZhuanfa::find($msg->id);
                    $f->state = 0;
                    $f->save();
                    echo '发送成功'.$msg->id;
                }
                sleep(3);
            }
        }
    }

    //
    public static function send($data)
    {
        return match ($data['type']) {
            'SendTextMsg' => VlwApiServer::SendTextMsg($data['robot_wxid'], $data['to_wxid'], $data['msg']),
            'SendImageMsg' => VlwApiServer::SendImageMsg($data['robot_wxid'], $data['to_wxid'], $data['msg']),
            'SendFileMsg' => VlwApiServer::SendFileMsg($data['robot_wxid'], $data['to_wxid'], $data['msg']),
            'SendVideoMsg' => VlwApiServer::SendVideoMsg($data['robot_wxid'], $data['to_wxid'], $data['msg']),
            'SendLinkMsg' => VlwApiServer::SendLinkMsg($data['robot_wxid'], $data['to_wxid'], $data['msg']),
        };
    }
}
