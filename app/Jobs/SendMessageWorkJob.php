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

class SendMessageWorkJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $url;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $url)
    {
        $this->data = $data;
        $this->url = $url;
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
                QyWechatData::send_work_api($this->data, $this->url);
            }else{
                // API 接口不正常，释放任务，3分钟后重试
                $this->release(now()->addMinutes(3));
            }
        }catch (Exception $e) {
            // API 接口不正常，释放任务，3分钟后重试
            $this->release(now()->addMinutes(3));
        }
    }

}
