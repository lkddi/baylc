<?php

namespace App\Services;

use App\Models\WxWork;
use App\Models\WxWorkUser;
use Exception;
use Log;

class CoreServer
{
    public static function handleRequest($request)
    {
        try {
            $handler = MessageHandlerFactory::createHandler($request['message_type']);
            return $handler->handle($request);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function WxAddUser($request)
    {
        $message_data = $request['message'];
        $user = WxWorkUser::where('sender', $message_data['sender'])->first();
        if (!$user) {
            $user = new WxWorkUser();
            $user->sender = $message_data['sender'];
            $user->name = $message_data['sender_name'];
            $user->save();
        }else{
            if (!empty($message_data['sender_name']) && $user->name !== $message_data['sender_name']) {
                $user->name = $message_data['sender_name'];
                $user->save();
            }
        }
    }
}
