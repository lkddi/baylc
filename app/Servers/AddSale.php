<?php

namespace App\Servers;

use App\Models\WxSale;
use App\Models\ZtProduct;
use App\Wechats\VlwApiServer;
use Illuminate\Support\Facades\Log;

class AddSale
{
    //增加销售


    public static function checkAdd($data)
    {
        error_reporting(0);
        //检查是否是群管理，群管理才有权记录
        if ($data['msg_source'] != NUll) {
            if (CheckGroupAdmin($data['from_group'], $data['from_wxid'])) {
                $user_wid = $data['msg_source']['atuserlist'][0]['wxid'];
                $user = qUser($user_wid, $data['from_group']);
                if ($user) {
                    if ($user->zt_store_code) {
                        $id = self::addSale($data, $user);
                        if ($id) {
                            VlwApiServer::SendTextMsg($data['robot_wxid'], $data['from_wxid'], '[鼓掌]我已经记下了！');
                        }
                    }
                }
            }
        }
    }

    /*
     * 根据 型号id 添加销售，并对库存进行操作
     *
     */
    public static function addSale($data, $user)
    {
        $x = explode(' ', $data['msg']);
        if (count($x) >= 3) {
            $p = ZtProduct::where('model', $x['1'])->first();
            if ($p) {
                $wxSale = new WxSale();
                $wxSale->zt_product_id = $p->id;
                $wxSale->zt_store_code = $user->zt_store_code;
                $wxSale->quantity = 1;
                $wxSale->amount = (int)$x[2];
                $wxSale->from_group = $data['from_group'];
                $wxSale->from_wxid = $data['from_wxid'];
                $wxSale->user = $user->wxid;
                $wxSale->save();
                return $wxSale->id;
            }
        }
    }

}
