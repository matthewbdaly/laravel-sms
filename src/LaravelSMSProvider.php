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
        $this->publishes([
            __DIR__.'/config.php' => config_path('sms.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('sms', function ($app) {
            $config = $app['config'];
            switch ($config['sms.default']) {
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
                        'api_key' => $config['sms.drivers.nexmo.api_key'],
                        'api_secret' => $config['sms.drivers.nexmo.api_secret'],
                    ]
                );
                break;
            case 'clockwork':
                $driver = new Clockwork(
                    new GuzzleClient,
                    new GuzzleResponse,
                    [
                        'api_key' => $config['sms.drivers.clockwork.api_key'],
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
