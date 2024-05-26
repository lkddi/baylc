<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Http\Resources\ZtPromoterstResource;
use App\Models\User;

class MyController extends Controller
{

    public function my()
    {
        $user = auth('api')->user();
        return new UserResource($user);
    }

    /**
     *  获取登录用户的奖励信息
     */

    public function showReward()
    {
        $user = auth('api')->user();

    }

}
