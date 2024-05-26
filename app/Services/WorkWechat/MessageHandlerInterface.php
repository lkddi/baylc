<?php

namespace App\Services\WorkWechat;

interface MessageHandlerInterface
{
    /**
     *  处理消息
     * @param $message
     */
    public function handle($message);
}
