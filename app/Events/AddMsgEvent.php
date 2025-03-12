<?php

namespace App\Events;


class AddMsgEvent
{

    /**
     * 处理文本消息
     */

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

}
