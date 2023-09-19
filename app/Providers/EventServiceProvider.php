<?php

namespace App\Providers;

use App\Events\ConfirmOrder;
use App\Events\UserCreated;
use App\Listeners\AdminNotificationListener;
use App\Listeners\UserCreatedListener;
use App\Models\User;
use App\Observers\UserObserver;
use App\Events\Registered;
use App\Listeners\ConfirmOrderClient;
use App\Listeners\ConfirmOrderSeller;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            AdminNotificationListener::class,
        ],
        UserCreated::class => [
            UserCreatedListener::class,
        ],
        ConfirmOrder::class => [
            ConfirmOrderClient::class,
            ConfirmOrderSeller::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();
        User::observe(UserObserver::class);

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
