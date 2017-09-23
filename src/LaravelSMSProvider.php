<?php

namespace Matthewbdaly\LaravelSMS\Providers;

use Illuminate\Support\ServiceProvider;
use Matthewbdaly\SMS\Drivers\Null as NullDriver;
use Matthewbdaly\SMS\Drivers\Log;
use Matthewbdaly\SMS\Drivers\Clockwork;
use Matthewbdaly\SMS\Drivers\Nexmo;
use Matthewbdaly\SMS\Client;

class LaravelSMSProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
