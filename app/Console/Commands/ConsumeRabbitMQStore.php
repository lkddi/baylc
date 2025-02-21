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
use PhpAmqpLib\Exception\AMQPIOException;
use PhpAmqpLib\Exception\AMQPRuntimeException;
use PhpAmqpLib\Message\AMQPMessage;

class ConsumeRabbitMQStore extends Command
{
    protected $signature = 'store:consume';
    protected $description = 'Consume messages from RabbitMQ';

    protected $connection;


    public function handle()
    {
        echo '开始消费' . "\n";
        try {
            $mq = new AMQPStreamConnection(
                env('RABBITMQ_HOST'),
                env('RABBITMQ_PORT'),
                env('RABBITMQ_USER'),
                env('RABBITMQ_PASSWORD'));
            $channel = $mq->channel();
        } catch (AMQPIOException $e) {
            // 可以在这里增加重试逻辑
            sleep(5); // 等待5秒后重试
            print_r('等待5秒后重试');
            return $this->handle(); // 递归调用自身
        }

        $queue = 'zt_store';

        $channel->queue_declare($queue, false, true, false, false);

        $callback = function (AMQPMessage $msg) use ($channel) {
            $data = json_decode($msg->body, true);
            echo '收到消息: ' . now() . "\n";
            $this->addData($data);
            echo '处理完成: ' . now() . "\n";
        };

//        $channel->basic_qos(null, 1, null);

        $channel->basic_consume($queue, '', false, true, false, false, $callback);

        while ($channel->is_consuming()) {
            try {
                $channel->wait();
            } catch (AMQPIOException $e) {
                Log::error('RabbitMQ Error: ' . $e->getMessage());
                // 实现重连逻辑
                return $this->handle();

            }
        }
    }

    public function addData($data)
    {
        try {
            $company  = checkStoreCompany($data['organizationName']);
            if (!$company){
                return false;
            }
            ZtStore::updateOrCreate(
                [
                    'code' => $data['code'],
                ],
                [
                    'name' => $data['name'],
                    'zt_company_id' => $company,
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
            $this->createOrUpdateRegion(ZtDeptBigRegion::class, $data['deptBigRegionCode'], $data['deptBigRegionName'], $company);
            $this->createOrUpdateRegion(ZtDeptRegion::class, $data['deptRegionCode'], $data['deptRegionName'], $company);
            $this->createOrUpdateRegion(ZtRetail::class, $data['retailCode'], $data['retailName'], $company);
            $this->createOrUpdateRegion(ZtCanalType::class, $data['canalCategoryCode'], $data['canalCategoryName'], $company);
            return true;
        } catch (\Exception $e) {
            // 捕获异常并记录日志
            Log::error('处理队列任务时发生异常：' . $e->getMessage());
        }
    }

    private function createOrUpdateRegion($modelClass, $code, $name, $companyid)
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
