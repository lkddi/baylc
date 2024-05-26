<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WxGroup;
use App\Models\WxWork;
use App\Services\QyWechatData;
use App\Services\WeChatFerry\AddSale;
use App\Services\WeChatFerry\Api;
use App\Services\WeChatFerry\Group;
use App\Wechats\EventGroupMemberAdd;
use Exception;
use Log;
use Request;
use function PHPUnit\Framework\isEmpty;


class WeChatController extends Controller
{
    public function api()
    {
//        Log::info('111微信接口访问');
//        Log::info(request()->all());
        $data = request()->all();
        try {
            if ($this->IfRoomid($data)) {
                //群聊
                (new \App\Services\WeChatFerry\Group)->Group($data);
            } else {
                //私聊
                if ($data['content'] == '1') {
                    throw new Exception('我在呢，我是小小。');
                }

            }

        } catch (Exception $e) {
            $touser = $this->IfRoomid($data) ? $data['roomid'] : $data['sender'];
            (new \App\Services\WeChatFerry\Api)->SendTextMsg('', $touser, $e->getMessage());
        }
    }

    public function IfRoomid($data)
    {
        if ($data['roomid'] == NULL) {
            //私聊
            return false;
        } else {
            //群聊
            return true;
        }
    }

    public function QyWchat()
    {
//        Log::info('企业微信接口访问');
//        Log::info(request()->all());
        $type = request()->get('message_type');
        $data = request()->get('message');
        $data = json_decode($data, true);

        $types = [
            11049,
            11041,
        ];
        try {
            if (in_array($type, $types)) {
            } else {
//                Log::info('未登记的type类型' . $type);
                return;
            }
            //群消息判断
            if (strpos($data['conversation_id'], 'R:') !== false) {
                $work = WxWork::where('roomid', $data['conversation_id'])->first();
                if (!$work) {
                    $work = new WxWork();
                    $work->roomid = $data['conversation_id'];
                    $work->save();
                }
            }
            if ($type == '11049') {
                if (strpos($data['desc'], '来自松下董冬明') !== false) {
                    $x = explode(' ', $data['remark']);
                    if (count($x) >= 3) {
                        if (count($x) >= 3) {
                            $num = $x[3] == '' ? 1 : $x[3];
                            if ($data['conversation_id'] == 'R:10886471727775134' || $data['conversation_id'] == 'R:10957429678709694') {
                                //零售云群
                                $group = '19370116010@chatroom';
                                AddSale::AddSale($group, $x[0], $x[1], $x[2], $num);
                            } else {
                                return;
                            }
                        }
                    }
                }
            }
        } catch (Exception $e) {
            QyWechatData::send_text_msg($this->getToUser($data), $e->getMessage());
        }

    }

    public function getToUser($data)
    {
//        $data = json_decode($data, true);
//    如果变量    $data['conversation_id'] 内包含 "R:" 则为群聊消息
        if (strpos($data['conversation_id'], 'S:') !== false) {
            return $data['conversation_id'];
        } else {
            return $data['receiver'];
        }
    }
}
