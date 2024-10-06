<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WxSaleResource;
use App\Models\WxSale;
use Illuminate\Http\Request;


class SaleListController extends Controller
{
    public function index(Request $request)
    {
        $sales = [];
        $user = $request->get('user');
        if ($user =='undefined') {
            return response()->json([
                'code' => 201,
                'data' => [],
                'message' => '未获取到用户信息！'
            ]);
        }
        $timestamp = $request->get('timestamp');
        // 访问url中的时间戳 小于当前时间5分钟 即为失效
//        if (time() * 1000 - $timestamp > 60000) {
//            return response()->json([
//                'code' => 201,
//                'data' => [],
//                'message' => '时间戳失效'
//            ]);
//        }
        if ($user) {
            $sales = WxSale::with('store','product')->where('from_wxid', $user)->orderBy('id','desc')->get();
            return response()->json([
                'code' => 200,
                'data' => WxSaleResource::collection($sales),
                'message' => '成功！'
            ]);

        }
        return response()->json([
            'code' => 201,
            'data' => [],
            'message' => '未能正确获取到数据！'
        ]);

    }

}
