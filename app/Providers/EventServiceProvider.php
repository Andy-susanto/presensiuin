<?php

namespace App\Providers;

use App\Events\BuatAkun;
use App\Listeners\BuatAkunUser;
use App\Models\Biodata;
use App\Observers\PasFotoObserver;
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
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            // ... other providers
            \SocialiteProviders\Google\GoogleExtendSocialite::class . '@handle',
        ],
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BuatAkun::class => [
            BuatAkunUser::class
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Biodata::observe(PasFotoObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
