<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ApiGatewayService;

class ApiGatewayServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('api.gateway', function ($app) {
            return new ApiGatewayService();
        });
    }
}
