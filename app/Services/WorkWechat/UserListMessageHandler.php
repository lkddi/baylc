<?php

namespace App\Services\WorkWechat;

use App\Models\WxUserList;
use App\Models\WxWork;
use App\Services\QyWechatData;
use App\Services\WxBot;
use EasyWeChat\Kernel\Messages\Message;
use Log;

class UserListMessageHandler implements MessageHandlerInterface
{
    public function handle($message)
    {
        if (isset($message['message_data']['user_list'])){
            $users = $message['message_data']['user_list'];
            foreach ($users as $user){
                WxUserList::updateOrCreate(
                    [
                        'user_id' => $user['user_id'],
                    ],
                    [
                       'acctid' => $user['acctid'],
                        'avatar' => $user['avatar'],
                        'conversation_id' => $user['conversation_id'],
                        'corp_id' => $user['corp_id'],
                        'mobile' => $user['mobile'],
                        'nickname' => $user['nickname'],
                        'position' => $user['position'],
                        'realname' => $user['realname'],
                        'remark' => $user['remark'],
                        'sex' => $user['sex'],
                        'unionid' => $user['unionid'],
                        'username' => $user['username'],
                    ]
                );
            }
        }
        return null;
    }
}
