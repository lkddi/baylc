<?php

namespace App\Console\Commands;

use App\Exceptions\WokeException;
use App\Models\WorkMessage;
use App\Models\WxUserList;
use App\Models\WxWork;
use App\Services\CoreServer;
use App\Services\QyWechatData;
use Cache;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
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
        try {
            $channel = $this->connection->channel();
        } catch (\PhpAmqpLib\Exception\AMQPRuntimeException $e) {
            Log::error('Failed to connect to RabbitMQ: ' . $e->getMessage());
            // 可以在这里增加重试逻辑
            sleep(5); // 等待5秒后重试
            return $this->handle(); // 递归调用自身
        }
//        $channel = $this->connection->channel();
        //        $queue = env('RABBITMQ_QUEUE');
        $queue = 'wechat_work';

        $channel->queue_declare($queue, false, true, false, false);

        $callback = function (AMQPMessage $msg) {
            // 处理消息逻辑
            echo '收到消息: ' . now() . "\n";
            //            echo '消息内容: '. $msg->body. "\n";
            $data = json_decode($msg->body, true);
//            $add = $data;
//            $add['message_data'] = json_encode($add['message_data']);
            // 信息类型type 如果是11187,11123,11051 则不保存到数据库,也不操作
            if (in_array($data['message_type'], [11187, 11123, 11051])) {
                return;
            }
            Cache::put('client_id', $data['client_id']);
//            WorkMessage::create($add);
//            unset($add);
            try {
                Log::info("收到的企业微信信息");
                Log::info($data);
                CoreServer::handleRequest($data);
            } catch (WokeException $e) {
//                echo '队列入口-异常: ' . $e->getMessage() . "\n";
//                Log::info($e->getData());
                if (isset($data['message_data'])) {
                    $message = $e->getData();

                    if (isset($message['send_user']) && $message['send_user']) {
                        $user = WxUserList::where('user_id', $data['message_data']['sender'])->first();
                        if ($user) {
                            $user = $user->conversation_id;
                        } else {
                            $user = $data['message_data']['conversation_id'];
                        }
                        $mess = [
                            "conversation_id" => $user,
                            "content" => $message['data']
                        ];
                        QyWechatData::send_work_api($mess, '/msg/send_text');
//                        QyWechatData::send_mq_msg($user,$message['data']);

                    } else {
                        if (isset($data['message_data']['conversation_id'])) {
                            $uid = $e->getData();
                            $mess = [
                                "conversation_id" => $data['message_data']['conversation_id'],
                                "content" => $message['data']
                            ];
                            QyWechatData::send_work_api($mess, '/msg/send_text');
//                            QyWechatData::send_mq_msg($data['message_data']['conversation_id'],$message['data']);
//                            QyWechatData::send_text_msg($this->getToUser($data['message_data']), $e->getMessage(), $uid);
                        }
                    }
                }
            }
        };

        $channel->basic_consume($queue, '', false, true, false, false, $callback);

        while ($channel->is_consuming()) {
            try {
                $channel->wait();
            } catch (\PhpAmqpLib\Exception\AMQPRuntimeException $e) {
                Log::error('Channel error: ' . $e->getMessage());
                // 重新声明队列或尝试重新连接
                $channel->close();
                $this->connection->close();
                return $this->handle();
            }
        }

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
