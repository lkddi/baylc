<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ZtSaleResource;
use App\Models\User;
use App\Models\WxWorkImg;
use App\Models\ZtSale;
use Cache;
use Illuminate\Http\Request;
use Log;

class WorkImgController extends Controller
{
    //


    public function index()
    {
        // 使用缓存键来存储和获取数据
        $cacheKey = 'api_item';

        // 从缓存中获取数据，如果不存在则执行闭包并将结果存入缓存
        $img = Cache::remember($cacheKey, 5, function () {
            return WxWorkImg::where('state', 0)->inRandomOrder()->first(); // 随机获取一条数据
        });
        return response()->json([
            'code' => 200,
            'data' => $img ?? false,
        ]);
    }


    public function save(Request $request)
    {
        $id = $request->get('id');
        $img = WxWorkImg::find($id);
        if ($img) {
            $img->state = $request->get('state');
            $img->path = $request->get('file_path', "");
            $img->ai = $request->get('ai', "");
            $img->save();
        }

    }


}
