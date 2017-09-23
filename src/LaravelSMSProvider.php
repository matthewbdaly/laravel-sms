<?php

namespace Matthewbdaly\LaravelSMS;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Matthewbdaly\SMS\Drivers\NullDriver;
use Matthewbdaly\SMS\Drivers\Log as LogDriver;
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
            $config = $app['config']->get('sms');
            switch ($config['driver']) {
                case 'null':
                    $driver = new NullDriver(
                        new GuzzleClient,
                        new GuzzleResponse
                    );
                    break;
                case 'nexmo':
                    $driver = new Nexmo(
                        new GuzzleClient,
                        new GuzzleResponse,
                        [
                            'api_key' => $config['api_key'],
                            'api_secret' => $config['api_secret'],
                        ]
                    );
                    break;
                default:
                    $driver = new LogDriver(
                        $app['log']
                    );
                    break;
            }
            return new Client($driver);
		});
	}
}
