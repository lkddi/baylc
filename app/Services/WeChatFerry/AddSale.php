<?php

namespace App\Services\WeChatFerry;

use App\Exceptions\WokeException;
use App\Models\WxSale;
use App\Models\WxWork;
use App\Models\ZtProduct;
use App\Models\ZtSale;
use App\Models\ZtStore;
use App\Servers\Server;
use Exception;

class AddSale
{
    /**
     * @param array $data 机器人收到信息
     * @param string $storename 门店名称
     * @param string $model 型号
     * @param int $amount 提成
     * @param int $num 数量
     * @return void
     * @throws Exception
     */
    public static function AddSale($data, $storename, $model, $amount, $num = 1, $user = null)
    {
        if ($data['sender_name']) {
            $msg = '[' . $data['sender_name'] . ']:';
        } else {

            $msg = '';
        }
        $group = $data['conversation_id'];
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

            $wxSale = new WxSale();
            $wxSale->model = $models->title;
            $wxSale->zt_product_id = $models->id;
            $wxSale->zt_company_id = $store->zt_company_id;
            $wxSale->zt_store_id = $store->id;
            $wxSale->zt_store_code = $store->code;
            $wxSale->quantity = $num;
            $wxSale->amount = $amount;
            $wxSale->price = $models->price;
            $wxSale->from_group = $group;
            $wxSale->from_wxid = $data['sender'];
            $wxSale->save();

            //操作库存
//            $groups = WxGroup::where('wxid', $group)->first();
//            $groups = WxWork::where('roomid', $group)->first();
//            if ($groups && $groups['kucun']) {
//                Server::reduceStore($store->id, $models->id, $num);
//            }
            $company = $store->zt_company_id;

            $mess['send_user'] = 0;
            $mess['data'] = "门店:[" . $storename . '] 销售 ' . $model . ' ' . $num . '台,登记成功!';
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
