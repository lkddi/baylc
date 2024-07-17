<?php

namespace App\Jobs;

use App\Models\ZtSale;
use App\Models\ZtStore;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
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

        $sales = ZtSale::where('tid', $data['TID'])->first();
        if (!$sales) {
            try {
                $sale = new ZtSale();
                $sale->tid = $data['TID'];
                $sale->year = $data['PUR_MACHINE_YEAR'];
                $sale->month = $data['PUR_MACHINE_MONTH'];
                $sale->date = $data['CREATIONDATE'] / 1000;;
                $sale->retailBillCode = $data['RETAILBILLCODE'];
                $sale->retailTypeName = $data['RETAILTYPENAME'];
                $sale->ownerShopName = $data['OWNERSHOPNAME'];
                $sale->model = $data['MODEL'];
                $sale->customerZeroAmount = $data['CUSTOMERZEROAMOUNT'];
                $sale->unitPrice = $data['UNITPRICE'];
                $sale->amount = $data['AMOUNT'];
                $ztStore = ZtStore::where('name', $data['OWNERSHOPNAME'])->first();
                $sale->zt_store_code = $ztStore ? $ztStore->value('code') : '';
                $sale->save();
                print "销售单添加成功:" . $data['TID'] . PHP_EOL;
            } catch (Exception $e) {
                Log::error("处理销售单时出错: " . $e->getMessage());
                // 重新抛出异常以便队列系统处理
                throw $e;
            }

        }
    }
}
