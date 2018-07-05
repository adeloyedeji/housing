<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        'App\Events\NewRegistrationEvent' => [
            'App\Listeners\NewRegistrationEventListener',
        ],
        'App\Events\AccountActivationEvent' => [
            'App\Listeners\AccountActivationEventListener',
        ],
        'App\Events\NewAdEvent' => [
            'App\Listeners\NewAdEventListener',
            'App\Listeners\NewAdNotificationListener'
        ],
        'Illuminate\Auth\Events\Login'  =>  [
            'App\Listeners\UserLoginListener'
        ], 
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
