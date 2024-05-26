<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use App\Http\Requests\Api\AuthorizationRequest;
use App\Http\Requests\Api\WeappAuthorizationRequest;

class AuthorizationsController extends Controller
{
    public function weappStore(WeappAuthorizationRequest $request)
    {
        $code = $request->code;

        // 根据 code 获取微信 openid 和 session_key
        $miniApp = app('easywechat.mini_app');

        $utils = $miniApp->getUtils();
        $data = $utils->codeToSession($code);
        \Log::info($data);

        // 如果结果错误，说明 code 已过期或不正确，返回 401 错误
        if (isset($data['errcode'])) {
            throw new AuthenticationException('code 不正确');
        }
        // 找到 openid 对应的用户
        $user = User::where('miniapp_openid', $data['openid'])->first();

        $attributes['miniapp_openid'] = $data['openid'];
        $attributes['tel'] = $request->get('tel');

        // 未找到对应用户则需要提交用户名密码进行用户绑定
        if (!$user) {
            $user = new User();
            $user->miniapp_openid = $data['openid'];
            $user->tel = $request->get('tel');
            $user->save();
        }

        // 更新用户数据
        $user->update($attributes);

        // 为对应用户创建 JWT
        $token = auth('api')->login($user);
//        return $user->createToken('token-name', ['server:update'])->plainTextToken;
//        $token = $user->createToken($data['openid']);
//        return ['token' => $token->plainTextToken];
        return $this->respondWithToken($token)->setStatusCode(201);
    }

//    public function tel(Request $request)
//    {
//
//        $miniApp = app('easywechat.mini_app');
//        $api = $miniApp->getClient();
//        $response = $api->postJson('wxa/business/getuserphonenumber?access_token='.$miniApp->getAccessToken()->getToken(), [
//            "code" => $request->get('code')
//        ]);
//        $r = $response->toArray();
//
//        if ($response['errcode']==0){
//            return $response['phone_info']['purePhoneNumber'];
//        }
//
//    }

    public function update()
    {
        $token = auth('api')->refresh();
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
