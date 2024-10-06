<?php

namespace App\Jobs;

use App\Models\ZtSale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;

class ProcessSales implements ShouldQueue
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
        $data = $this->data;
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
