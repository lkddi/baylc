<?php

namespace App\Listeners;

use App\Events\ZtStoreUpdated;
use App\Models\ZtStore;
use Cache;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ZtStoreCacheUpdater
{

    /**
     * Handle the event.
     *
     * @param  \App\Events\ZtStoreUpdated  $event
     * @return void
     */
    public function handle(ZtStoreUpdated $event)
    {
        // 获取指定字段的数据
//        $stores = ZtStore::select('id', 'name', 'storename','nickname')->get();

        // 序列化数据以节省空间（可选）
//        $serializedStores = serialize($stores);
//        Cache::put('stores', $stores, now()->addDay()); // 缓存一天
    }
}
