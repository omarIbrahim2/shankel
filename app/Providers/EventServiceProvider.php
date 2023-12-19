<?php

namespace App\Providers;

use App\Events\SchoolViews;
use App\Events\AddToCardEvent;
use App\Events\ClearNotification;
use App\Listeners\increaseViews;

use App\Events\UserRegisterEvent;
use App\Events\RemoveFromCardEvent;
use App\Events\UpdateCard;
use Illuminate\Auth\Events\Lockout;
use App\Listeners\AddToCardListener;
use App\Listeners\ClearNotificationListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\UserRegisterListener;
use App\Listeners\RemoveFromCardListener;
use App\Listeners\updateCardListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
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
            SendEmailVerificationNotification::class,
        ],

        SchoolViews::class => [
            increaseViews::class,
        ],

        AddToCardEvent::class =>[
              AddToCardListener::class,
        ],

        RemoveFromCardEvent::class => [
             RemoveFromCardListener::class,
        ],

        UserRegisterEvent::class =>[
             UserRegisterListener::class,
        ],

        ClearNotification::class => [
            ClearNotificationListener::class,
        ],

        UpdateCard::class => [
           updateCardListener::class,
        ],

       

        
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

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
