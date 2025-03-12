<?php

namespace App\Providers;

use App\Events\AddMsgEvent;
use App\Events\FinanceEvent;
use App\Events\OfflineEvent;
use App\Listeners\AddMsgEventListener;
use App\Listeners\FinanceEventListener;
use App\Listeners\OfflineEventListener;
use App\Models\WxSale;
use App\Models\ZtSale;
use App\Observers\WxSaleObserver;
use App\Observers\ZtSaleObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Queue\Events\JobQueued;
use Illuminate\Support\Facades\Event;
use Log;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \App\Events\ZtStoreUpdated::class => [
            \App\Listeners\ZtStoreCacheUpdater::class,
        ],
        OfflineEvent::class => [
            OfflineEventListener::class,
        ],
        AddMsgEvent::class=>[
            AddMsgEventListener::class,
        ],
        FinanceEvent::class=>[
            FinanceEventListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
//        ZtSale::observe(ZtSaleObserver::class);
//        parent::boot();
//        Event::listen(JobQueued::class, function ($event) {
//            Log::info('Job has been queued', ['job' => $event->job]);
//        });
    }

    /**
     * 应用程序的模型观察者。
     *
     * @var array
     */
    protected $observers = [
        ZtSale::class=>[ZtSaleObserver::class],
        WxSale::class=>[WxSaleObserver::class]
    ];
    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
