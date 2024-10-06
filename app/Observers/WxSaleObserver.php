<?php

namespace App\Observers;

use App\Models\InventoryLog;
use App\Models\WxSale;

class WxSaleObserver
{
    /**
     * Handle the WxSale "created" event.
     *
     * @param \App\Models\WxSale $wxSale
     * @return void
     */
    public function created(WxSale $wxSale)
    {
        $woker = $wxSale->work;
        if ($woker && $woker->kucun) {
            InventoryLog::create([
                'zt_products_id' => $wxSale->zt_product_id,
                'zt_stores_id' => $wxSale->zt_store_id,
                'type' => 'out',
                'quantity' => $wxSale->quantity,
                'description' => '销售 减库存'
            ]);
        }

    }

    /**
     * Handle the WxSale "updated" event.
     *
     * @param \App\Models\WxSale $wxSale
     * @return void
     */
    public function updated(WxSale $wxSale)
    {
        //
    }

    /**
     * Handle the WxSale "deleted" event.
     *
     * @param \App\Models\WxSale $wxSale
     * @return void
     */
    public function deleted(WxSale $wxSale)
    {
        $worker = $wxSale->work;
        if ($worker && $worker->kucun) {
            InventoryLog::create([
                'zt_products_id' => $wxSale->zt_product_id,
                'zt_stores_id' => $wxSale->zt_store_id,
                'type' => 'in',
                'quantity' => $wxSale->quantity,
                'description' => '删除销售记录 加库存'
            ]);
        }
    }

    /**
     * Handle the WxSale "restored" event.
     *
     * @param \App\Models\WxSale $wxSale
     * @return void
     */
    public function restored(WxSale $wxSale)
    {
        //
    }

    /**
     * Handle the WxSale "force deleted" event.
     *
     * @param \App\Models\WxSale $wxSale
     * @return void
     */
    public function forceDeleted(WxSale $wxSale)
    {
        //
    }
}
