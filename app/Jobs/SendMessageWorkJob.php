<?php

namespace App\Jobs;

use App\Services\QyWechatData;
use Cache;
use Exception;
use Http;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;

class SendMessageWorkJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $api_url;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $api_url)
    {
        $this->data = $data;
        $this->api_url = $api_url;
    }

    /**
     * 执行任务。
     *
     * @return void
     */
    public function handle()
    {
        // 检查远程 API 接口是否可用
        try {
            $response = Http::get('http://10.0.0.130:8000/docs');
            if ($response->successful()){
                QyWechatData::send_work_api($this->data, $this->api_url);
                Log::info('webapi 接口可用，发送消息');

            }else{
                Log::info('webapi 不可用，释放任务');
                sleep(10);
                $this->release(10);
            }
        }catch (Exception $e) {
            Log::error('webapi 接口不可用，error');
            Log::error($e->getMessage());
            $this->release(10);
        }
    }

}
