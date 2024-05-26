<?php

namespace App\Http\Controllers;

use App\Http\Requests\WxUserRequest;
use App\Http\Resources\WxUserResource;
use App\Models\WxUser;
use Illuminate\Http\JsonResponse;

class WxUserController extends Controller
{
    /**
     * 获取用户信息
     * @param $id
     * @return JsonResponse
     */
    public function index($id): JsonResponse
    {
        return $this->success(data: new WxUserResource(WxUser::find($id)), code: 1);

    }

    /**
     * 保存 用户门店 接口
     * @param WxUserRequest $request
     * @return JsonResponse
     */
    public function save(WxUserRequest $request): JsonResponse
    {
        $store_id = $request->get('store');
        $user = WxUser::find($request->get('id'));
        if ($user) {
            if (is_string($store_id)) $user->zt_store_code = $store_id;
            $user->nostoremsg = $request->get('nostoremsg');
            $a = $user->save();
            if ($a) {
                return $this->success(code: 1);
            }
        }
        return $this->success(data: '保存失败!');

    }
}
