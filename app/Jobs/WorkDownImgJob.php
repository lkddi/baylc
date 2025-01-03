<?php

namespace App\Jobs;

use App\Services\QyWechatData;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;

class WorkDownImgJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $message;

    /**
     * Create a new job instance.企业微信下载图片任务
     *
     * @param  $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
// 处理消息的逻辑
        Log::info('企业微信下载图片任务开始执行');
        echo "企业微信下载图片任务开始执行\n";
        $message_data = $this->message;
        if (IfRoomid($message_data)) {
            $path = str_replace(':', '', $message_data['conversation_id']);
        } else {
            $path = $message_data['sender'];
        }
        $filename = $message_data['appinfo'] . '_' . $message_data['sender'] . '.jpg';
        $message_data['save_path'] = 'c:\\cdn\\images\\' . $path . '\\' . $filename;
        $req = QyWechatData::down_img($message_data);
        $req = json_decode($req, true);
        if ($req['status'] == "success") {

        }
        Log::info($req);
    }
}
