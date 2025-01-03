<?php

namespace App\Jobs;

use App\Services\CoreServer;
use App\Services\QyWechatData;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;

class ProcessRabbitMQMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $message;

    /**
     * Create a new job instance.企业微信消息处理
     *
     * @param string $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws Exception
     */
    public function handle()
    {
        // 处理任务的逻辑
        $data = json_decode($this->message, true);
//        try {
//            // 调用 CoreServer 的静态方法处理请求
//            echo '队列入口: '  .now() . "\n";
//            Log::info('队列入口: ', ['data' => $data]);
////            CoreServer::handleRequest($data);
//        } catch (Exception $e) {
//            echo '队列入口-异常: '  . $e->getMessage() . "\n";
//            if (isset($data['message_data']) && isset($data['message_data']['conversation_id']))
//            {
//                QyWechatData::send_text_msg(self::getToUser($data['message_data']), $e->getMessage());
//            }
//        }
    }
    /**
     * Handle a job failure.
     *
     * @param Exception $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        // 记录失败日志
        Log::error('Queue job permanently failed', [
            'job' => self::class,
            'data' => $this->message,
            'error' => $exception->getMessage(),
        ]);

        // 其他失败处理逻辑，例如发送通知或执行补救操作
    }
    public static function getToUser($data)
    {
        if (strpos($data['conversation_id'], 'S:') !== false) {
            return $data['conversation_id'];
        } else {
            return $data['receiver'];
        }
    }
}
