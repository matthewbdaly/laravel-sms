<?php

class TestCase extends Orchestra\Testbench\TestCase
{
	protected function getPackageProviders($app)
	{
		return ['Matthewbdaly\LaravelSMS\Providers\LaravelSMSProvider'];
	}

	protected function getPackageAliases($app)
	{
		return [
			'SMS' => 'Matthewbdaly\LaravelSMS\Facade'
		];
	}
}
