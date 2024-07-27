<?php
namespace App\Services\WeChatFerry;

use App\Models\WxGroup;
use App\Models\WxSale;
use App\Models\WxWork;
use App\Models\ZtProduct;
use App\Models\ZtStore;
use App\Servers\Server;
use Exception;

class AddSale
{
    /**
     * @param string $group 群id
     * @param string $storename 门店名称
     * @param string $model 型号
     * @param int $amount 提成
     * @param  $num 数量
     * @return void
     * @throws Exception
     */
    public static function AddSale($group,$storename,$model,$amount, $num=1)
    {
        try {
            $models = self::checkmodel($model);
            if (!$models){
                throw new Exception('商品不存在:'.$model);
            }
            $store = self::checkstore($storename);
            if (!$store){
                throw new Exception('门店不存在:'.$storename.'请尽快核实!！');
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
            $wxSale->save();

            //操作库存
//            $groups = WxGroup::where('wxid', $group)->first();
            $groups = WxWork::where('roomid', $group)->first();
            if ($groups && $groups['kucun']) {
                Server::reduceStore($store->code, $models->id, $num);
            }
            throw new Exception($storename.'销售 '.$model.' '.$num.'台,登记成功');
        } catch (Exception $e) {
            throw $e;
        }


    }

    public static function checkmodel($model)
    {
       $models = ZtProduct::where('model', $model)->first();
         if ($models) {
              return $models;
            }else {
                return false;
            }
    }

    public static function checkstore($name)
    {
        $models = ZtStore::where('nickname', $name)->first();
        if ($models) {
            return $models;
        }else {
            return false;
        }
    }
}
