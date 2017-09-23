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

    public function testNexmoDriverSetup()
    {
        $this->app['config']->set('sms.driver', 'nexmo');
        $this->app['config']->set('sms.api_key', 'MY_NEXMO_API_KEY');
        $this->app['config']->set('sms.api_secret', 'MY_NEXMO_API_SECRET');
        $client = $this->app->make('sms');
        $this->assertInstanceOf('Matthewbdaly\SMS\Client', $client);
        $this->assertEquals('Nexmo', $client->getDriver());
    }

    public function testClockworkDriverSetup()
    {
        $this->app['config']->set('sms.driver', 'clockwork');
        $this->app['config']->set('sms.api_key', 'MY_CLOCKWORK_API_KEY');
        $client = $this->app->make('sms');
        $this->assertInstanceOf('Matthewbdaly\SMS\Client', $client);
        $this->assertEquals('Clockwork', $client->getDriver());
    }
}
