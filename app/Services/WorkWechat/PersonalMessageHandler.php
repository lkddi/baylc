<?php

namespace App\Services\WorkWechat;

use App\Exceptions\WokeException;
use App\Models\WxUserList;
use App\Models\WxWork;
use App\Models\ZtProduct;
use App\Services\QyWechatData;
use App\Services\WeChatFerry\AddSale;
use App\Services\WxBot;
use Exception;
use Log;
use Str;

class PersonalMessageHandler implements MessageHandlerInterface
{
    /**
     * 个人消息处理器 群及个人消息
     * @param $message
     * @return false|void
     * @throws Exception
     */
    public function handle($message)
    {
        if (!isset($message['message_data'])) return false;
        try {
            $message_data = $message['message_data'];
            $content = $message_data['content'];
            // 群消息处理
            if (IfRoomid($message_data)) {
                $group = WxWork::where('roomid', $message_data['conversation_id'])->first();
                if (!$group) {
                    $work = new WxWork();
                    $work->roomid = $message_data['conversation_id'];
                    $work->save();
                } elseif ($group['isadd']) {
                    if (checkAndPrepend($content, 4, '增加')) {
                        $title = str_replace('增加 ', '', $content);
                        $x = explode(' ', $title);
                        if (count($x) >= 3) {
                            AddSale::AddSale($message_data, $x[0], $x[1], $x[2], $x[3] ?? 1);
                        }
                    }
                }

                if (checkAndPrepend($content, 3, '添加型号')) {
                    $title = str_replace('添加型号 ', '', $content);
                    $x = explode(' ', $title);
//                    $a = explode(' ', $x[0]);
                    if (strpos($x[1], '-') !== false || strpos($x[1], '+') !== false) {
                        if (count($x) >= 2) {
                            $product = ZtProduct::where('model', $x[0])->first();
                            if (!$product) {
                                $product = new ZtProduct();
                                $product->title = $x[1];
                                $product->model = $x[0];
//                            $product->price = $x[2];
//                            $product->ticheng = $x[3];
                                $product->save();
                                $mess['send_user'] = 0;
                                $mess['data'] = $x[0] . ' 型号增加成功!';
                                throw new WokeException('ok', $mess);
                            } else {
                                $mess['send_user'] = 0;
                                $mess['data'] = $x[0].':该型号已经存在，请勿重复增加!';
                                throw new WokeException('ok', $mess);
                            }
                        }
                    } else {
                        $mess['send_user'] = 0;
                        $mess['data'] = '增加格式为 简称 全型号，你提供的信息有误，请检查后重试!' . $x[1];
                        throw new WokeException('ok', $mess);
                    }

                }
            } else {
                $bot = WxBot::where('clientId', $message['client_id'])->first();
                if ($bot) {
                    if ($bot->wxid != $message_data['sender']) {
                        WxUserList::updateOrCreate(
                            [
                                'user_id' => $message_data['sender'],
                            ],
                            [
                                'conversation_id' => $message_data['conversation_id'],
                                'username' => $message_data['sender_name'],
                            ]
                        );
                    }
                }
                if ($content == '数据查询') {
                    $user = WxUserList::where('user_id', $message_data['sender'])->first();
                    if ($user) {
                        $mess['guid'] = \Cache::get('client_id');
                        $mess['conversation_id'] = $user->conversation_id;
                        $mess['title'] = '销售助理-销售记录查询';
                        $mess['desc'] = '查询你登记的销售记录信息';
                        $mess['url'] = 'https://js.ay.lc/?user=' . $user->user_id;
                        $mess['image_url'] = 'https://js.ay.lc/static/123.jpeg';
                        QyWechatData::send_work_api($mess, '/msg/send_link_card');
                        return;
                    }
                }
            }

            // 检查 at_list 是否有内容
            if (!empty($message_data['at_list'])) {
                // 遍历 at_list 数组
                foreach ($message_data['at_list'] as $user) {
                    // 检查 user_id 是否为 1688856965630846
                    if ($user['user_id'] === '1688856965630846') {
                        // 移除 @昵称 部分
                        $content = $message_data['content'];
                        $nickname = '@' . $user['nickname'];
                        $content = str_replace($nickname, '', $content);
                        // 移除空格
                        $content = trim($content);
                    }
                }
            }
            if ($content == '123') {
//                echo '收到主人问话: ' . $content . "\n";
                $mess['send_user'] = 0;
                $mess['data'] = '我是销售小助手，我在，随时为你工作!';
                throw new WokeException('ok', $mess, 1);
            }


        } catch (WokeException $e) {
            throw $e;
        }
    }

}
