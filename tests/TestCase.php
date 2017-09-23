<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
	protected function getPackageProviders($app)
	{
		return ['Matthewbdaly\LaravelSMS\LaravelSMSProvider'];
	}

	protected function getPackageAliases($app)
	{
		return [
			'SMS' => 'Matthewbdaly\LaravelSMS\Facade'
		];
	}
}
