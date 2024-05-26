<?php

namespace App\Console\Commands;

use App\Jobs\ProcessRabbitMQMessage;
use App\Models\WorkMessage;
use App\Services\CoreServer;
use App\Services\QyWechatData;
use Exception;
use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class ConsumeRabbitMQ extends Command
{
    protected $signature = 'rabbitmq:consume';
    protected $description = 'Consume messages from RabbitMQ';

    protected $connection;

    public function __construct(AMQPStreamConnection $connection)
    {
        parent::__construct();
        $this->connection = $connection;
    }

    public function handle()
    {
        $channel = $this->connection->channel();
        $queue = env('RABBITMQ_QUEUE');

        $channel->queue_declare($queue, false, true, false, false);

        $callback = function (AMQPMessage $msg) {
            // 处理消息逻辑
            echo '收到消息: '. now(). "\n";
            echo '消息内容: '. $msg->body. "\n";
            $data = json_decode($msg->body, true);
            $add = $data;
            $add['message_data'] = json_encode($add['message_data']);
            WorkMessage::create($add);
            unset($add);
            try {
                CoreServer::handleRequest($data);
            } catch (Exception $e) {
                echo '队列入口-异常: ' . $e->getMessage() . "\n";
                if (isset($data['message_data']) && isset($data['message_data']['conversation_id'])) {
                    QyWechatData::send_text_msg($this->getToUser($data['message_data']), $e->getMessage());
                }
            }
        };

        $channel->basic_consume($queue, '', false, true, false, false, $callback);

        while ($channel->is_consuming()) {
            $channel->wait();
        }

        $channel->close();
        $this->connection->close();
    }

    public function getToUser($data)
    {
        if (strpos($data['conversation_id'], 'R:') !== false) {
            return $data['conversation_id'];
        } else {
            return $data['receiver'];
        }
    }
}
