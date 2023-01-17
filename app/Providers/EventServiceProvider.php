<?php

namespace App\Providers;

use App\Events\ActionNotificationEvent;
use App\Events\ChatNotificationEvent;
use App\Events\SMSNotificationEvent;
use App\Events\TelegramNotificationDocumentVerifiedEvent;
use App\Events\TelegramNotificationEvent;
use App\Events\TelegramNotificationProfileVerifiedEvent;
use App\Events\TelegramNotificationTourVerifiedEvent;
use App\Listeners\ActionNotificationListener;
use App\Listeners\ChatNotificationListener;
use App\Listeners\SMSNotificationListener;
use App\Listeners\TelegramNotificationListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
        ActionNotificationEvent::class => [
            ActionNotificationListener::class,
        ],
        ChatNotificationEvent::class => [
            ChatNotificationListener::class,
        ],
        SMSNotificationEvent::class => [
            SMSNotificationListener::class,
        ],
        TelegramNotificationDocumentVerifiedEvent::class => [
            TelegramNotificationListener::class,
        ],
        TelegramNotificationProfileVerifiedEvent::class => [
            TelegramNotificationListener::class,
        ],
        TelegramNotificationTourVerifiedEvent::class => [
            TelegramNotificationListener::class,
        ],
        TelegramNotificationEvent::class => [
            TelegramNotificationListener::class,
        ],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            // ... other providers
            \SocialiteProviders\VKontakte\VKontakteExtendSocialite::class.'@handle',
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
