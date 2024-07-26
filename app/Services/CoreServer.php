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
            self::WxAddUser($request);
            $handler = MessageHandlerFactory::createHandler($request['message_type']);
            return $handler->handle($request);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function WxAddUser($request)
    {
        try {
            $messageData = $request['message_data'];
            if (IfRoomid($messageData)) {
                $work = WxWork::where('roomid', $messageData['conversation_id'])->first();
                if ($work) {
                    if ($work->user) {
                        $user = WxWorkUser::firstOrCreate(
                            ['sender' => $messageData['sender']],
                            ['sender_name' => $messageData['sender_name']]
                        );

                        if (!empty($messageData['sender_name']) && $user->name !== $messageData['sender_name']) {
                            $user->sender_name = $messageData['sender_name'];
                            $user->save();
                        }
                    }
                } else {
                    WxWork::create([
                        'roomid' => $messageData['conversation_id'],
                    ]);
                }
            }
        } catch (Exception $e) {
            throw $e;
        }
        return true;
    }
}
