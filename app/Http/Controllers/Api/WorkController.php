<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorkMessage;
use Exception;
use Illuminate\Http\Request;
use Log;
use Validator;

class WorkController extends Controller
{
    public function work(Request $request)
    {
        $message = $request->all();

//        Log::info('Api 请求参数');
//        Log::info($message);
        // 使用 Laravel 自带的验证功能
        $validator = Validator::make($request->all(), [
            'client_id' => 'required|string',
            'message_type' => 'required',
        ]);
        // 自定义错误信息
//        $messages = [
//            'client_id.required' => 'client_id 不能为空',
//            'client_id.string' => 'client_id 必须为字符串',
//            'message_type.required' => 'message_type 不能为空',
//        ];


        if ($validator->fails()) {
            return $this->sendErrorResponse($validator);
        }
        // 处理逻辑...
        $message['message_data'] = json_encode($message['message_data']);
        $m = WorkMessage::create($message);
        return $this->sendSuccessResponse($m);

    }

    protected function sendSuccessResponse($data, $code = 200)
    {
        return response()->json([
            'success' => true,
            'data'    => $data,
        ], $code);
    }
    protected function sendErrorResponse($validator)
    {
        return response()->json([
            'success' => false,
            'message' => '验证失败',
            'errors'  => $validator->errors(),
        ], 400);
    }
}
