<?php

namespace App\Events;

class OfflineEvent
{
    /**
     * 处理掉线事件
     */

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }
}
