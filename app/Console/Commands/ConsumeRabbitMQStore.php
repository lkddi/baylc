<?php

namespace App\Console\Commands;

use App\Jobs\ProcessRabbitMQMessage;
use App\Jobs\ProcessStors;
use App\Models\WorkMessage;
use App\Models\ZtCanalType;
use App\Models\ZtDeptBigRegion;
use App\Models\ZtDeptRegion;
use App\Models\ZtRetail;
use App\Models\ZtStore;
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
//                    echo '消息内容: ' . $msg->body . "\n";
//                    ProcessStors::dispatch($data);
                    $this->addData($data);
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
    }

    public function addData($data)
    {
        try {
            echo $data['code']. "\n";
            ZtStore::updateOrCreate(
                [
                    'code' => $data['code'],
                    'zt_company_id'=>$data['company']
                ],
                [
                    'name' => $data['name'],
                    'deptBigRegionName' => $data['deptBigRegionName'],
                    'deptBigRegionCode' => $data['deptBigRegionCode'],
                    'deptRegionName' => $data['deptRegionName'],
                    'deptRegionCode' => $data['deptRegionCode'],
                    'retailCode' => $data['retailCode'],
                    'retailName' => $data['retailName'],
                    'facadeShort' => $data['facadeShort'],
                    'warehouseName' => $data['warehouseName'],
                    'canalCategoryCode' => $data['canalCategoryCode'],
                    'canalCategoryName' => $data['canalCategoryName'],
                    'canalTypeName' => $data['canalTypeName'],
//                    'canalTypeCode' => $data['canalTypeCode'],
                    'isEnable' => $data['isEnable'],
                    'riscode' => $data['riscode'],
                    'storename' => $data['storename'],
                    'storecode' => $data['storecode'],
                    'zid' => $data['id'],
                    'provinceName' => $data['provinceName'],
                    'cityName' => $data['cityName'],
                    'countyName' => $data['countyName'],
                    'townName' => $data['townName'],
                    'ext23' => $data['ext23'],
                ]
            );
            $this->createOrUpdateRegion(ZtDeptBigRegion::class, $data['deptBigRegionCode'], $data['deptBigRegionName'],$data['company']);
            $this->createOrUpdateRegion(ZtDeptRegion::class, $data['deptRegionCode'], $data['deptRegionName'],$data['company']);
            $this->createOrUpdateRegion(ZtRetail::class, $data['retailCode'], $data['retailName'],$data['company']);
            $this->createOrUpdateRegion(ZtCanalType::class, $data['canalTypeCode'], $data['canalTypeName'],$data['company']);
        } catch (\Exception $e) {
            // 捕获异常并记录日志
            Log::error('处理队列任务时发生异常：' . $e->getMessage());
        }
    }
    private function createOrUpdateRegion($modelClass, $code, $name,$companyid)
    {
        try {
            if (!empty($code)) {
                $region = $modelClass::updateOrCreate(['code' => $code], ['title' => $name, 'zt_company_id' => $companyid]);
//                echo $name . ' 添加成功' . PHP_EOL;
            }
        } catch (\Exception $e) {
            // 捕获异常并记录日志
            Log::error('处理队列任务时发生异常：' . $e->getMessage());
        }
    }

}
