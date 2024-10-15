<?php

namespace App\Console\Commands;

use App\Jobs\ProcessRabbitMQMessage;
use App\Jobs\ProcessSales;
use App\Models\ZtSale;
use App\Services\CoreServer;
use App\Services\QyWechatData;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
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

        try {
            $channel = $this->connection->channel();
        } catch (\PhpAmqpLib\Exception\AMQPRuntimeException $e) {
            Log::error('Failed to connect to RabbitMQ: ' . $e->getMessage());
            // 可以在这里增加重试逻辑
            sleep(5); // 等待5秒后重试
            return $this->consumeMessages(); // 递归调用自身
        }
        $queue = 'zt_sale';

        $channel->queue_declare($queue, false, true, false, false);

        $callback = function (AMQPMessage $msg) {
            // 处理消息逻辑
            echo '收到消息: ' . now() . "\n";
//            echo '消息内容: ' . $msg->body . "\n";
            $data = json_decode($msg->body, true);

//            ProcessSales::dispatch($data);
            $this->addData($data);
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


    public function addData($data)
    {
        try {
            $a = ZtSale::updateOrCreate(
                [
                    'tid' => $data['TID'],
                    'zt_company_id' => $data['company']
                ], [
                'year' => $data['PUR_MACHINE_YEAR'],
                'month' => $data['PUR_MACHINE_MONTH'],
                'date' => $data['CREATIONDATE'] / 1000,
                'code' => $data['RETAILBILLCODE'],//销售单号
//                'type' => $data['RETAILTYPENAME'], //销售方式 普通零售-B
//                'type' => $data['OWNERSHOPNAME'],
                'model' => $data['MODEL'],
                'customerZeroAmount' => $data['CUSTOMERZEROAMOUNT'],
                'unitPrice' => $data['UNITPRICE'],
                'amount' => $data['AMOUNT'],
//                'deptBigRegionName' => $data['SLICEAREANAME'],//大区
//                'risCode' => $data['RISCODE'],//ris编码
                'type' => $data['SALETYPENAME'],//正向销售
            ]);
//            Log::info($a);

        } catch (\Exception $e) {
            // 捕获异常并记录日志
            Log::error('处理队列任务时发生异常：' . $e->getMessage());
        }
    }

}
