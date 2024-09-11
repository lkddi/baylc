<?php

namespace App\Jobs;

use App\Models\ZtCanalType;
use App\Models\ZtDeptBigRegion;
use App\Models\ZtDeptRegion;
use App\Models\ZtRetail;
use App\Models\ZtStore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;

class ProcessStors implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $data = $this->data;
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
//            $store = ZtStore::where('code', $data['code'])->first();
//
//            if (!$store) {
//                $store = new ZtStore();
//                $store->name = $data['name'];
//                $store->code = $data['code'];
//                $store->deptBigRegionName = $data['deptBigRegionName'];
//                $store->deptBigRegionCode = $data['deptBigRegionCode'];
//                $store->deptRegionName = $data['deptRegionName'];
//                $store->deptRegionCode = $data['deptRegionCode'];
//                $store->retailCode = $data['retailCode'];
//                $store->retailName = $data['retailName'];
//                $store->facadeShort = $data['facadeShort'];
////                $store->warehouseName = $data['warehouseName'];
//                $store->canalCategoryCode = $data['canalCategoryCode'];
//                $store->canalCategoryName = $data['canalCategoryName'];
//                $store->isEnable = $data['isEnable'];
//                $store->riscode = $data['riscode'];
//                $store->storename = $data['storename'];
//                $store->storecode = $data['storecode'];
//                $store->zid = $data['id'];
//                $store->provinceName = $data['provinceName'];
//                $store->cityName = $data['cityName'];
//                $store->countyName = $data['countyName'];
//                $store->townName = $data['townName'];
//                $store->ext23 = $data['ext23'];
//                $store->save();
//                echo $data['name'] . ' 添加成功' . PHP_EOL;
//            }else{
//                if($store->new != $data['isEnable']){
//                    $store->isEnable = $data['isEnable'];
//                    $store->save();
//                }
//            }
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
