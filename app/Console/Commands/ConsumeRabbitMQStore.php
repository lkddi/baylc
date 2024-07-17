<?php

namespace App\Console\Commands;

use App\Jobs\ProcessRabbitMQMessage;
use App\Jobs\ProcessStors;
use App\Models\WorkMessage;
use App\Services\CoreServer;
use App\Services\QyWechatData;
use Exception;
use Illuminate\Console\Command;
use Log;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class ConsumeRabbitMQStore extends Command
{
    protected $signature = 'store:consume';
    protected $description = 'Consume messages from RabbitMQ';

    protected $connection;

    public function __construct(AMQPStreamConnection $connection)
    {
        parent::__construct();
        $this->connection = $connection;
    }

    public function handle()
    {
        echo '开始消费' . "\n";
        try {
            $channel = $this->connection->channel();
            $queue = 'zt_store';

            $channel->queue_declare($queue, false, true, false, false);

            $callback = function (AMQPMessage $msg) use ($channel) {
                try {
                    $data = json_decode($msg->body, true);
                    echo '收到消息: ' . now() . "\n";

                    ProcessStors::dispatch($data);
                    $channel->basic_ack($msg->getDeliveryTag());
                } catch (\Exception $e) {
                    // 处理错误，可能的话重新入队
                    $channel->basic_nack($msg->getDeliveryTag());
                    Log::error('Error processing message: ' . $e->getMessage());
                }
            };

            $channel->basic_qos(null, 1, null);
            $channel->basic_consume($queue, '', false, false, false, false, $callback);

            while ($channel->is_consuming()) {
                $channel->wait();
            }
        } catch (\Exception $e) {
            Log::error('RabbitMQ Error: ' . $e->getMessage());
            // 实现重连逻辑
        } finally {
            $channel->close();
            $this->connection->close();
        }







//        $channel = $this->connection->channel();
//        $queue = 'zt_store';
//
//        $channel->queue_declare($queue, false, true, false, false);
//
//        $callback = function (AMQPMessage $msg) {
//            // 处理消息逻辑
////            echo '收到消息: ' . now() . "\n";
////            echo '消息内容: ' . $msg->body . "\n";
//            $data = json_decode($msg->body, true);
//
//            ProcessStors::dispatch($data);
//        };
//
//        $channel->basic_consume($queue, '', false, true, false, false, $callback);
//
//        while ($channel->is_consuming()) {
//            $channel->wait();
//        }
//
//        $channel->close();
//        $this->connection->close();
    }

}
