<?php

namespace Matthewbdaly\LaravelSMS;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Matthewbdaly\SMS\Drivers\NullDriver;
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
		$this->app->singleton('sms', function ($app) {
            $driver = new NullDriver(
                new GuzzleClient,
                new GuzzleResponse
            );
            return new Client($driver);
		});
	}
}
