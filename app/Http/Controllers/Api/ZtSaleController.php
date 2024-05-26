<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ZtSaleResource;
use App\Models\User;
use App\Models\ZtSale;
use Illuminate\Http\Request;

class ZtSaleController extends Controller
{
    //

    public function sales()
    {
        $sales = auth('api')->user()->info;
        if (!$sales){
            return ['message'=>'未找到该手机号相关用户信息'];
        }

        $sales = auth('api')->user()->info->sales
//            ->where('ownerShopCode','BJSN01030')
//            ->where('purMachineTime','>',strtotime($a)*100)
                ->where('purMachineYear',date('Y',time()))
                ->where('purMachineMonth',date('m',time()));
//        ->orderBy('purMachineTime','desc');
        $sale = collect($sales);
        $data['data'] = ZtSaleResource::collection($sales);
        $data['count'] = $sale->count();
        $data['amount'] = $sale->sum('proposeRetailPrice');
//        $data['percentage'] = $sale->sum('proposeRetailPrice');
//        $data['reward'] = $sale->sum('proposeRetailPrice');

        return $data;
    }

    
}
