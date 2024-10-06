<?php

namespace App\Observers;

use App\Models\InventoryLog;
use App\Models\ZtProduct;
use App\Models\ZtSale;
use App\Models\ZtStore;
use DB;
use Illuminate\Support\Facades\Log;

class ZtSaleObserver
{
    /**
     * Handle the ZtSale "created" event.
     *
     * @param \App\Models\ZtSale $ztSale
     * @return void
     */
    public function created(ZtSale $ztSale)
    {
        try {
            DB::beginTransaction(); // 开始事务
            // 查询店铺信息
            $store = ZtStore::where('name', $ztSale->name)->first();
            // 查询产品信息
            $product = ZtProduct::where('title', $ztSale->model)->first();
            // 更新关联 ID
            if ($store) {
                $ztSale->zt_store_id = $store->id;
            }
            if ($product) {
                $ztSale->zt_product_id = $product->id;
            }

            // 保存更新后的数据
            $ztSale->save();

            // 创建库存日志
            InventoryLog::create([
                'zt_product_id' => $ztSale->zt_product_id,
                'zt_store_id' => $ztSale->zt_store_id,
                'type' => 'out',
                'quantity' => $ztSale->quantity,
                'description' => '销售 减库存'
            ]);

            DB::commit(); // 提交事务

        } catch (\Exception $e) {
            DB::rollBack(); // 回滚事务
            Log::error('Error in ZtSale created observer: ' . $e->getMessage());
            // 可以记录日志、发送邮件等
        }
    }

    /**
     * Handle the ZtSale "updated" event.
     *
     * @param \App\Models\ZtSale $ztSale
     * @return void
     */
    public function updated(ZtSale $ztSale)
    {
        //
    }

    /**
     * Handle the ZtSale "deleted" event.
     *
     * @param \App\Models\ZtSale $ztSale
     * @return void
     */
    public function deleted(ZtSale $ztSale)
    {
        InventoryLog::create([
            'zt_product_id' => $ztSale->zt_product_id,
            'zt_store_id' => $ztSale->zt_store_id,
            'type' => 'in',
            'quantity' => $ztSale->quantity,
            'description' => '销售单据删除 恢复库存'
        ]);
    }

    /**
     * Handle the ZtSale "restored" event.
     *
     * @param \App\Models\ZtSale $ztSale
     * @return void
     */
    public function restored(ZtSale $ztSale)
    {
        //
    }

    /**
     * Handle the ZtSale "force deleted" event.
     *
     * @param \App\Models\ZtSale $ztSale
     * @return void
     */
    public function forceDeleted(ZtSale $ztSale)
    {
        //
    }
}
