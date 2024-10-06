<?php

namespace App\Providers;

use App\Services\FastgptService;
use Illuminate\Support\ServiceProvider;

class FastgptServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FastgptServiceProvider::class, function ($app) {
            return new FastgptService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
