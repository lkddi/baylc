<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ApiGateway extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'api.gateway';
    }
}
