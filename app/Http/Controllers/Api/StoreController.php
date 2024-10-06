<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\ZtStoreResource;
use App\Models\ZtStore;
use Cache;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->get('user');
        if ($user =='undefined') {
            return response()->json([
                'code' => 201,
                'data' => [],
                'message' => '未获取到用户信息！'
            ]);
        }
        if ($request->get('user')=='7881302503935047' || $request->get('user')=='7881300063097963'){

//            $stores = Cache::get('stores');
//            if (!$stores){
                $stores = ZtStore::Enable()->get();
//            }
        }else{
            $stores = ZtStore::where('zt_company_id', 2)->Enable()->get();
        }

        return ZtStoreResource::collection($stores);
    }

    public function save(StorePostRequest $request)
    {
        $validated = $request->validated();
        $store = ZtStore::find($validated['id']);
        if ($store){
            $store->nickname = $validated['nickname'];
            $store->save();
            return response()->json([
                'message' => '门店信息修改成功！',
                'data' => $request->validated(),
                'statusCode' => 200,
            ], 200);
        }else{
            return response()->json([
                'message' => '提交数据有误！',
                'data' => $request->validated(),
                'statusCode' => 442,
            ], 200);
        }

    }


}
