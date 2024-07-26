<?php

namespace App\Console\Commands;

use App\Models\WorkMessage;
use App\Services\CoreServer;
use App\Services\QyWechatData;
use Exception;
use Illuminate\Console\Command;
use Log;
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
        echo '开始工作中...';
        $channel = $this->connection->channel();
//        $queue = env('RABBITMQ_QUEUE');
        $queue = 'wechat_work';

        $channel->queue_declare($queue, false, true, false, false);

        $callback = function (AMQPMessage $msg) {
            // 处理消息逻辑
            echo '收到消息: '. now(). "\n";
//            echo '消息内容: '. $msg->body. "\n";
            $data = json_decode($msg->body, true);
            $add = $data;
            $add['message_data'] = json_encode($add['message_data']);
            // 信息类型type 如果是11187,11123,11051 则不保存到数据库,也不操作
            if (in_array($data['message_type'], [11187, 11123, 11051])) {
                return;
            }
            WorkMessage::create($add);
            unset($add);
            try {
                Log::info("收到的企业微信信息");
                Log::info($data);
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

//        echo '开始工作中...';
//        $channel = $this->connection->channel();
////        $queue = config('rabbitmq.queue');
//        $queue = 'wechat_work';
//
//        $channel->queue_declare($queue, false, true, false, false);
//
//        $channel->basic_consume($queue, '', false, true, false, false, function (AMQPMessage $msg) {
//            $this->processMessage($msg);
//        });
//
//        while ($channel->is_consuming()) {
//            $channel->wait();
//        }
//
//        $this->closeConnection($channel);
    }

    /**
     * 消费消息
     * @param AMQPMessage $msg
     * @return void
     */
    private function processMessage(AMQPMessage $msg)
    {
        echo '收到消息: ' . now() . "\n";
        echo '消息内容: ' . $msg->body . "\n";
        $this->logMessage($msg);

        $data = $this->parseMessage($msg);

        if ($this->shouldSkipMessage($data)) {
            return;
        }

        $this->saveMessage($data);

        try {
            CoreServer::handleRequest($data);
        } catch (Exception $e) {
            $this->handleException($e, $data);
        }
    }

    /**
     * 记录消息
     * @param AMQPMessage $msg
     * @return void
     */
    private function logMessage(AMQPMessage $msg)
    {
        $now = now()->toDateTimeString();
        Log::info("Received message at {$now}: {$msg->body}");
    }

    /**
     * 解析消息
     * @param AMQPMessage $msg
     * @return mixed
     */
    private function parseMessage(AMQPMessage $msg)
    {
        $data = json_decode($msg->body, true);
        $data['message_data'] = json_encode($data['message_data']);
        return $data;
    }

    /**
     * 判断是否跳过消息
     * @param array $data
     * @return bool
     */
    private function shouldSkipMessage(array $data): bool
    {
        return in_array($data['message_type'], [11187, 11123, 11051]);
    }

    /**
     * 保存消息
     * @param array $data
     * @return void
     */
    private function saveMessage(array $data)
    {
        WorkMessage::create($data);
    }

    /**
     * 处理异常
     * @param Exception $e
     * @param array $data
     * @return void
     */
    private function handleException(Exception $e, array $data)
    {
        Log::error('Queue entry exception: ' . $e->getMessage());

        if (isset($data['message_data']['conversation_id'])) {
            $toUser = $this->getToUser($data['message_data']);
            QyWechatData::send_text_msg($toUser, $e->getMessage());
        }
    }

    /**
     * 关闭连接
     * @param $channel
     * @return void
     * @throws Exception
     */
    private function closeConnection($channel)
    {
        $channel->close();
        $this->connection->close();
    }

    public function getToUser($data)
    {
        if (strpos($data['conversation_id'], 'R:') !== false) {
            return $data['conversation_id'];
        } else {
            return $data['conversation_id'];
        }
    }
}
