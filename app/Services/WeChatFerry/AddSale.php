<?php

namespace App\Services\WeChatFerry;

use App\Exceptions\WokeException;
use App\Models\WxSale;
use App\Models\WxWork;
use App\Models\ZtProduct;
use App\Models\ZtSale;
use App\Models\ZtStore;
use App\Servers\Server;
use App\Services\FastgptService;
use Carbon\Carbon;
use Exception;
use Log;

class AddSale
{
    /**
     * @param array $data 机器人收到信息
     * @return void
     * @throws Exception
     */
    public static function AddSale($data)
    {
        if (isset($data['message_data']['remark'])) {
            $remarkParts = explode(' ', $data['message_data']['remark']);
        } else {
            $title = str_replace('增加 ', '', $data['message_data']['content']);
            $remarkParts = explode(' ', $title);

        }
        $storename = $remarkParts[0];
        $model = $remarkParts[1];

//        Log::info($remarkParts);
        if ($data['message_data']['sender_name']) {
//            $msg = '[' . $data['message_data']['sender_name'] . ']:';
            $msg = '';
        } else {
            $msg = '';
        }
        $group = $data['message_data']['conversation_id'];
        try {
            $store = self::checkstore($storename);
            if (!$store) {
                $mess['send_user'] = 1;
                $mess['data'] = $msg . '门店不存在:' . $storename . '登录系统后台查看门店清，或者联系管理员!！';
                throw new WokeException('ok', $mess);
            }
            $models = self::checkmodel($model);
            if (!$models) {
                $mess['send_user'] = 1;
                $mess['data'] = $msg . '商品不存在:' . $model . '如果型号没有错误，那请联系管理增加型号';
                throw new WokeException('ok', $mess);
            }
//            $num = is_numeric($remarkParts[3]) && $remarkParts[3] != 0 ? $remarkParts[3] : 1;
//            $num = $remarkParts[3] ?? 1;
            if (empty($remarkParts[3])) {
                $num = 1;
            } else {
                $num = $remarkParts[3];
            }
            $wxSale = new WxSale();
            $wxSale->model = $models->title;
            $wxSale->zt_product_id = $models->id;
            $wxSale->zt_company_id = $store->zt_company_id;
            $wxSale->zt_store_id = $store->id;
            $wxSale->zt_store_code = $store->code;
            $wxSale->quantity = $num;
            $wxSale->amount = $remarkParts[2] ?? 0;
            $wxSale->price = $models->price;
            $wxSale->from_group = $group;
            $wxSale->from_wxid = $data['message_data']['sender'];
            $wxSale->save();

            //操作库存
//            $groups = WxGroup::where('wxid', $group)->first();
//            $groups = WxWork::where('roomid', $group)->first();
//            if ($groups && $groups['kucun']) {
//                Server::reduceStore($store->id, $models->id, $num);
//            }
//            $company = $store->zt_company_id;
//            $mess['data'] = "门店:[" . $storename . '] 销售 ' . $model . ' ' . $num . '台,登记成功!';
//            $fast = new FastgptService(2);
//            $fast->sendFastgpt($mess['data'], $data['conversation_id'], $data['conversation_id']);
//            throw new WokeException('ok', $mess);


//            $massage = $msg . "门店:[".$storename . '] 销售 ' . $model . ' ' . $num . '台,登记成功!';
// 获取本月的第一天和最后一天
            $firstDayOfMonth = Carbon::now()->startOfMonth();
            $lastDayOfMonth = Carbon::now()->endOfMonth();

//            $sales = $store->wxsales()
//                ->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])
//                ->sum('quantity');
//            $ss = '';
//            if ($sales>5){
//                $ss = '本月已经累计销售'.$sales.'台';
//            }
            // 首先查询销售数量和总金额
            $salesData = $store->wxsales()
                ->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])
                ->selectRaw('sum(quantity) as total_quantity, sum(amount * quantity) as total_amount')
                ->first();

            // 获取销售数量
            $sales = $salesData->total_quantity;

            // 获取总销售金额
            $totalAmount = $salesData->total_amount;

            // 根据销售数量判断并生成消息
            if ($salesData) {
                $ss = PHP_EOL . "本月已经累计销售{$sales}台，累计获得红包{$totalAmount}元" . PHP_EOL;
            }

            $company = $store->zt_company_id;
            $mess['send_user'] = 0;
            $mess['data'] = $msg . "恭喜门店:" . $store->name . '(' . $storename . ') :' . PHP_EOL . '销售松下' . $models->title . ' ' . $num . '台，获得红包 ' . $remarkParts[2] * $num . '元!' . $ss . '大卖大卖大卖[庆祝]';
            throw new WokeException('ok', $mess, $company);
        } catch (WokeException $e) {
            throw $e;
        }


    }

    public static function checkmodel($model)
    {
        $models = ZtProduct::where('model', $model)->first();
        if ($models) {
            return $models;
        } else {
            return false;
        }
    }

    public static function checkstore($name)
    {
        $models = ZtStore::where('nickname', $name)->first();
        if ($models) {
            return $models;
        } else {
            return false;
        }
    }


    public function querySales(ZtStore $store)
    {
        $store->wxsales();
    }


}
