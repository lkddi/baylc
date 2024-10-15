<?php

namespace App\Services;

use App\Jobs\FastgptJob;
use App\Jobs\SendMessageWorkJob;
use Cache;
use http\Client;
use Illuminate\Support\Facades\Http;

class FastgptService
{
    public $HOST_URL = 'https://c.ay.lc/api';
    public $API_KEY = 'fastgpt-dElmFRIpLlZAVoO5PUzn9CtMSm7Uxo2a0Iml6ptGp60yfK7bfYNKf7sUeNDJsPtd';
//    public $API_KEY = 'fastgpt-lAbUf64vzzZ37PEWesEDKMYVjipEnbUPlK9WpOknzR3ObHVsH6SvHm7ZQ';

    public $data;
    public $gptid;

    public function __construct($gptid = 1)
    {
        $gptid;
        if ($gptid == 1) {
            // 小助手模型
            $this->API_KEY = 'fastgpt-dElmFRIpLlZAVoO5PUzn9CtMSm7Uxo2a0Iml6ptGp60yfK7bfYNKf7sUeNDJsPtd';
        } elseif ($gptid == 2) {
            // 润色模型
            $this->API_KEY = 'fastgpt-juUgnVhvc4vEGLCxkX18BfLTHCFTjBicBRTOwcngcSb94QWwF1nj4r';

        }
    }

    public function sendMessage($data, $id = null)
    {
        $this->data = $data;
        $Id = $data['sender'] . $data['conversation_id'];
        Cache::add($Id, md5($Id . now()), 600);
        if (count($data['at_list']) > 1) {
            return false;
        }
        foreach ($data['at_list'] as $user) {
            // 检查 user_id 是否为 1688856965630846
            if ($user['user_id'] === '1688856965630846') {
                $this->sendAi($user);
            }
        }
    }

    public function sendAi($user)
    {
        $data = $this->data;
        $Id = $data['sender'] . $data['conversation_id'];
        $content = $data['content'];
        $nickname = '@' . $user['nickname'];
        $content = str_replace($nickname, '', $content);
        // 移除空格
        $content = trim($content);
        $url = $this->HOST_URL . '/v1/chat/completions';
        $headers = [
            'Authorization' => 'Bearer ' . $this->API_KEY,
        ];
        $post_data = [
            "chatId" => Cache::get($Id),//为 undefined 时（不传入），不使用 FastGpt 提供的上下文功能，完全通过传入的 messages 构建上下文。 不会将你的记录存储到数据库中，你也无法在记录汇总中查阅到。
            //为非空字符串时，意味着使用 chatId 进行对话，自动从 FastGpt 数据库取历史记录，并使用 messages 数组最后一个内容作为用户问题。请自行确保 chatId 唯一，长度小于250，通常可以是自己系统的对话框ID。
            "stream" => false,
            "detail" => false,//detail: 是否返回中间值（模块状态，响应的完整结果等），stream模式下会通过event进行区分，非stream模式结果保存在responseData中。
            "variables" => [//variables: 模块变量，一个对象，会替换模块中，输入框内容里的{{key}}
                "uid" => $data['sender'],
                "name" => $data['sender_name']
            ],
            "messages" => [  //messages: 结构与 GPT接口 chat模式一致。
                [
                    "content" => $content,
                    "role" => "user"
                ]
            ]
        ];
        $response = Http::retry(1, 200)->withHeaders($headers)->post($url, $post_data);
        if ($response->successful()) {
            $message = $response->json();
            $contentWithoutSpecialChars = str_replace(["*", "_"], "", $message['choices'][0]['message']['content']);
            $send['content'] = $contentWithoutSpecialChars;
            $send['guid'] = $data['sender'];
            $send['conversation_id'] = $data['conversation_id'];
            SendMessageWorkJob::dispatch($send, '/msg/send_text');

            return true;
        } else {
            \Log::error('API request failed: ' . $response->body());
//                    $this->sendMessage($data);
            return false;
        }
    }


    /**
     * 发送消息 并回复
     * @param $content //文本内容
     * @param $to //返回给谁
     * @param $chatId //上下文ID
     * @return bool
     */
    public function sendFastgpt($content, $to, $chatId = 'undefined'): bool
    {
        $url = $this->HOST_URL . '/v1/chat/completions';
        $headers = [
            'Authorization' => 'Bearer ' . $this->API_KEY,
        ];
        $post_data = [
            "chatId" => $chatId,//为 undefined 时（不传入），不使用 FastGpt 提供的上下文功能，完全通过传入的 messages 构建上下文。 不会将你的记录存储到数据库中，你也无法在记录汇总中查阅到。
            //为非空字符串时，意味着使用 chatId 进行对话，自动从 FastGpt 数据库取历史记录，并使用 messages 数组最后一个内容作为用户问题。请自行确保 chatId 唯一，长度小于250，通常可以是自己系统的对话框ID。
            "stream" => false,
            "detail" => false,//detail: 是否返回中间值（模块状态，响应的完整结果等），stream模式下会通过event进行区分，非stream模式结果保存在responseData中。
//            "variables" => [//variables: 模块变量，一个对象，会替换模块中，输入框内容里的{{key}}
//                "uid" => $data['sender'],
//                "name" => $data['sender_name']
//            ],
            "messages" => [  //messages: 结构与 GPT接口 chat模式一致。
                [
                    "content" => $content,
                    "role" => "user"
                ]
            ]
        ];
        $response = Http::retry(1, 200)->withHeaders($headers)->post($url, $post_data);
        if ($response->successful()) {
            $message = $response->json();
            $contentWithoutSpecialChars = str_replace(["*", "_"], "", $message['choices'][0]['message']['content']);
            $send['content'] = $contentWithoutSpecialChars;
            $send['conversation_id'] = $to;
            SendMessageWorkJob::dispatch($send, '/msg/send_text');
            return true;
        } else {
            \Log::error('API request failed: ' . $response->body());
//                    $this->sendMessage($data);
            return false;
        }
    }
}
