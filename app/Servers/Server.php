<?php

namespace App\Servers;

use App\Models\Warehouse;
use App\Models\WxBot;
use App\Models\WxUser;
use App\Models\ZtProduct;
use Carbon\Carbon;
use Exception;

class Server
{
    public static function updateBot($datas)
    {
        $datas = json_decode($datas, true);
        WxBot::where('open',1)->update(['online'=>0]);
        if (!$datas['Code']) {
            foreach ($datas['ReturnJson']['data'] as $key => $data) {
                $c['username'] = $data['username'];
                $c['online'] = 1;
                $c['wx_num'] = $data['wx_num'];
                $c['wx_headimgurl'] = $data['wx_headimgurl'];
                $c['robot_type'] = $data['Enterprise wechat'];
                $c['clientId'] = $data['Enterprise wechat clientId'];
                WxBot::query()->updateOrCreate(
                    ['wxid' => $data['wxid']], $c
                );
            }
        }
    }

    /**
     * 记录提成
     * @param $data
     * @throws \App\Coco\CocoException
     */
    public static function addTc($data)
    {
        $x = explode(' ', $data['Title']);
        if (count($x) >= 3) {
            $StoreHouse = StoreServer::findstores($x[0]);
            $models = ProductServer::findmodels(strtoupper($x[1]));
            $m = [
                'mendian' => $StoreHouse['name'],
                'store_id' => $StoreHouse['id'],
                'model' => $models['model'],
                'product_id' => $models['id'],
                'num' => (int)$x[2],
                'cjdata' => Carbon::now()->toDateTimeString(),
                'user' => $data['UserName'],
                'price' => !empty($x[3]) ? $x[3] : $models['Price'],
                'name' => !empty($x[4]) ? $x[4] : ''
            ];

            Ticheng::create($m);
            $mss = '';
            $kucun = StockPile::where(['store_houses_id' => $StoreHouse['id'], 'products_id' => $models['id']])->first();
            if ($kucun) {
                $comment = '客户:' . $StoreHouse['name'] . '型号' . $models['model'] . '由' . $kucun->Quantity . '减1';
                LogServer::add('sales', '1', $comment);

                $kucun->increment('nums');
                $kucun->decrement('Quantity');
                $kucun->save();

//                if ($kucun->Quantity < 2 && $kucun->Quantity >= 0) {
//                    if ($kucun->Quantity == 0 && $kucun->product->offline == 0) {
//                        $mss .= $models['model'] . ':老品卖完了可以上新样机了!' . PHP_EOL;
//                    }
//                    $mss .= $StoreHouse['name'] . '，以下型号可能需要补货了：' . PHP_EOL;
//                    $mss .= StoreServer::searchstore($StoreHouse['id']);
//                } else {
//                    $mss = '(' . $StoreHouse['name'] . ', ' . $models['model'] . '还有';
//                    $mss .= $kucun->Quantity . '台，如不对请反馈！)';
//                }

                if ($kucun->Quantity < 3 && $kucun->Quantity >= 0) {
                    $mss = '(该型号还有';
                    $mss .= $kucun->Quantity . '台，如不对请反馈！)';
                }
            } else {
                unset($kucun);
                $kucun = new StockPile;
                $kucun->store_houses_id = $StoreHouse['id'];
                $kucun->products_id = $models['id'];
                $kucun->nums = 1;
                $kucun->Quantity = -1;
                $kucun->save();
                $mss = '(' . $StoreHouse['name'] . ', ' . $models['model'] . '发货可能未录入!';
            }
            $answer = Lexicon::where('type', 'add')->inRandomOrder()->first();
            $mss = $answer['answer'] . PHP_EOL . $mss;
            //活动记录
//            $today = Carbon::today();
//            $first = Carbon::create(2020, 09, 10, 00, 00, 00);
//            $enddate = Carbon::create(2020, 10, 20, 23, 59, 59);
//            if ($today >= $first && $enddate >= $today) {
//                TaskController::add($StoreHouse['id']);
////                $mss .= TaskController::check($StoreHouse['id']);
//            }
//            if ($data['api'] == 'pc') {
//                ApiServer::send_text_msg($data['robot_wxid'], $data['FromId'], $mss);
//            } else {
//                GetWechat::SendMessage($data['FromId'], $mss);
//            }
            SendMsg::SendMessage($data, $mss);


        }
    }


    /**
     * 库存操作
     * @param $store_id
     * @param $product_id
     * @param int $num
     * @return void
     */
    public static function reduceStore($store_id, $product_id, int $num=1)
    {
        $data = Warehouse::where('zt_stores_id', $store_id)
            ->where('zt_products_id', $product_id)->first();
        if ($data) {
            $data->increment('nums',$num);
            $data->decrement('quantity',$num);
            $data->save();
        } else {
            $kucun = new Warehouse;
            $kucun->zt_stores_id = $store_id;
            $kucun->zt_products_id = $product_id;
            $kucun->nums = $num;
            $kucun->quantity = -$num;
            $kucun->save();
        }
    }

    /**
     * 是否包含
     * @param $text
     * @param $arr
     * @return bool
     */
    public static function check_in($text, $arr)
    {
//        $arr = (new self())->KUCUN;
        if ($arr) {
            foreach ($arr as $key) {
                if (strstr($text, $key) != '') {
                    return true;
                    break;
                }
            }
        }
        return false;
    }

    /**
     * 截取字符串
     * @param $input //要截取字符串
     * @param $start //要截取字符串前内容
     * @param $end //要截取字符串后内容
     * @return false|string
     */
    public static function get_between($input, $start, $end)
    {
        return substr($input, strlen($start) + strpos($input, $start), (strlen($input) - strpos($input, $end)) * (-1));
    }


    public static function extract($data)
    {
        $content = simplexml_load_string($data['Content']);
        $key = 0;
        $u = $content->sysmsgtemplate->content_template->link_list->link;
        foreach ($u as $x) {
            foreach ($x->memberlist->member as $wxs) {
                $key += 1;
                $user[$key]['Wxid'] = (string)$wxs->username;
                $user[$key]['SenderNick'] = (string)$wxs->nickname;
                $user['key'] = $key;
//            WechatUserServer::addUser($user[$key]);
            }
        }
        return $user;
    }


    /**
     * 查询型号id
     * @param $data
     * @return int
     */
    public static function findmodel($data)
    {
        if (!empty($data)) {
            $xing = ZtProduct::where('model', $data)->first();
            if ($xing) {
                return $xing->id;
            }
            unset($xing);

            $xing = ZtProduct::where('model', 'like', '%' . $data . '%')->get()->toArray();
            if ($xing && count($xing) < 2) {
                return $xing[0]['id'];
            }
            unset($xing);
            $xing = ZtProduct::where('title', $data)->first();
            if ($xing) {
                return $xing->id;
            }
            unset($xing);
            $xing = ZtProduct::where('title', 'like', '%' . $data . '%')->get()->toArray();
            if ($xing && count($xing) < 2) {
                return $xing[0]['id'];
            }
            return 0;
        } else {
            return 0;
        }
    }


}
