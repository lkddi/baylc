<?php

namespace App\Services\Rabbitmq;

use App\Providers\RabbitMQServiceProvider;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitmqServer
{
    protected $connection;

    protected $channel;
    protected $queue;

    public function __construct()
    {
        $this->queue = 'wechat_1';
        $this->connection = new AMQPStreamConnection(
            env('RABBITMQ_HOST', '127.0.0.1'),
            env('RABBITMQ_PORT', 5672),
            env('RABBITMQ_USER', 'guest'),
            env('RABBITMQ_PASSWORD', 'guest'),
//            env('RABBITMQ_VHOST', '/')
        );
        $this->channel = $this->connection->channel();
        $this->channel->queue_declare($this->queue, false, true, false, false);
    }

    public function send(array $data)
    {
        $messageBody = json_encode($data);
        $message = new AMQPMessage($messageBody, [
            'content_type' => 'application/json',
            'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT
        ]);

        $this->channel->basic_publish($message, '', $this->queue);
    }

    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }

}
