<?php

namespace App\Console\Commands;

use App\Jobs\ProcessRabbitMQMessage;
use App\Jobs\ProcessSales;
use App\Services\CoreServer;
use App\Services\QyWechatData;
use Exception;
use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class ConsumeRabbitMQSales extends Command
{
    protected $signature = 'sales:consume';
    protected $description = 'Consume messages from RabbitMQ';

    protected $connection;

    public function __construct(AMQPStreamConnection $connection)
    {
        parent::__construct();
        $this->connection = $connection;
    }

    public function handle()
    {
        $this->consumeMessages();
    }

    protected function consumeMessages()
    {
        $channel = $this->connection->channel();
        $queue = 'zt_sale';

        $channel->queue_declare($queue, false, true, false, false);

        $callback = function (AMQPMessage $msg) {
            // 处理消息逻辑
            echo '收到消息: ' . now() . "\n";
//            echo '消息内容: ' . $msg->body . "\n";
            $data = json_decode($msg->body, true);

            ProcessSales::dispatch($data);
        };

        $channel->basic_consume($queue, '', false, true, false, false, $callback);
        while ($channel->is_consuming()) {
            try {
                $channel->wait();
            } catch (Exception $e) {
                $this->error('mq连接丢失，正在重新连接...');
                $this->reconnect();
                $this->consumeMessages(); // 重新调用消费方法
            }
        }

        $channel->close();
        $this->connection->close();
    }

    protected function reconnect()
    {
        $this->connection = app(AMQPStreamConnection::class); // 重新实例化连接
    }

}
