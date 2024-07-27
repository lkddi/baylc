<?php

namespace App\Services;

use App\Models\WorkMessage;
use App\Models\WxWork;
use App\Models\WxWorkUser;
use Exception;
use Log;

class CoreServer
{
    public static function handleRequest($request)
    {
        try {
            self::WxWork($request);
            $handler = MessageHandlerFactory::createHandler($request['message_type']);
            return $handler->handle($request);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function WxWork($request)
    {
        try {
            $messageData = $request['message_data'];
            if (IfRoomid($messageData)) {
                $work = WxWork::where('roomid', $messageData['conversation_id'])->first();
                if ($work) {
                    if ($work->user) {
                        self::addUser($request, $work);
                    }
                    if ($work->chat){
                        self::saveMessage($request);
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

    public static function saveMessage($data)
    {
        try {
            $add = $data;
            $add['message_data'] = json_encode($data['message_data']);
//            $data['message_data'] = json_encode($data);
            // 信息类型type 如果是11187,11123,11051 则不保存到数据库,也不操作
            if (in_array($data['message_type'], [11187, 11123, 11051])) {
                return;
            }
//            WorkMessage::create($add);
            unset($add);
        }catch (Exception $e){
            throw $e;
        }
    }


    public static function addUser($data,WxWork $work)
    {
        $messageData = $data['message_data'];
        $user = WxWorkUser::firstOrCreate(
            ['sender' => $messageData['sender']],
            ['sender_name' => $messageData['sender_name']]
        );

        if (!empty($messageData['sender_name']) && $user->name !== $messageData['sender_name']) {
            $user->sender_name = $messageData['sender_name'];
            $user->save();
        }

        // 判断用户是否已存在 不存在则创建 关联关系
        $existingWorkUsers = $work->WorkUsers->pluck('id')->toArray();
        if (!in_array($user->id, $existingWorkUsers)) {
            $work->WorkUsers()->attach($user);
        }
    }
}
