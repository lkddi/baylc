<?php

namespace App\Console\Commands;

use App\Exceptions\WokeException;
use App\Models\WxUserList;
use App\Services\CoreServer;
use App\Services\QyWechatData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exception\AMQPIOException;
use PhpAmqpLib\Message\AMQPMessage;

class TestMq extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:mq';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        print_r('1');
        try {
            $mq = new AMQPStreamConnection(
                env('RABBITMQ_HOST'),
                env('RABBITMQ_PORT'),
                env('RABBITMQ_USER'),
                env('RABBITMQ_PASSWORD'));
            $channel = $mq->channel();
        } catch (AMQPIOException $e) {
            Log::error('Failed to connect to RabbitMQ: ' . $e->getMessage());
            // 可以在这里增加重试逻辑
            sleep(5); // 等待5秒后重试
            print_r('等待5秒后重试');
            return $this->handle(); // 递归调用自身
        }
        $queue = 'testMQ1';
        $channel->queue_declare($queue, false, true, false, false);
        $callback = function (AMQPMessage $msg) {
            // 处理消息逻辑
            $data = json_decode($msg->body, true);
            echo '收到消息: ' . now() . "\n";
            print_r($data);
        };

        $channel->basic_consume($queue, '', false, true, false, false, $callback);
        while ($channel->is_consuming()) {
            try {
                $channel->wait();
            } catch (AMQPIOException $e) {
                Log::error('Channel error: ' . $e->getMessage());
                // 重新声明队列或尝试重新连接
                $channel->close();
                return $this->handle();
            }
        }
        $channel->close();
    }
}
