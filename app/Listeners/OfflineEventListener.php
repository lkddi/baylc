<?php

namespace App\Listeners;

use App\Events\OfflineEvent;
use Log;

class OfflineEventListener
{
    public function handle(OfflineEvent $event)
    {
        // 处理掉线通知的逻辑
        Log::channel('gewe_daily')->info('掉线通知');
        Log::channel('gewe_daily')->info($event);
    }
}
