<?php

namespace App\Services\MessageHandlers;

interface MessageHandlerInterface
{
    public function handle($message);
}
