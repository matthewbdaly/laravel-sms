<?php

namespace Tests;

class ServiceProviderTest extends TestCase
{
    public function testNullDriverSetup()
    {
        $this->app['config']->set('sms.driver', 'null');
        $client = $this->app->make('sms');
        $this->assertInstanceOf('Matthewbdaly\SMS\Client', $client);
        $this->assertEquals('Null', $client->getDriver());
    }

    public function testLogDriverSetup()
    {
        $this->app['config']->set('sms.driver', 'log');
        $client = $this->app->make('sms');
        $this->assertInstanceOf('Matthewbdaly\SMS\Client', $client);
        $this->assertEquals('Log', $client->getDriver());
    }
}
