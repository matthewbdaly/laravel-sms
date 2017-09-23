<?php

namespace Tests;

use SMS;
use Mockery as m;

class ServiceProviderTest extends TestCase
{
    public function testNullDriverSetup()
    {
        $this->app['config']->set('sms.default', 'null');
        $client = $this->app->make('sms');
        $this->assertInstanceOf('Matthewbdaly\SMS\Client', $client);
        $this->assertEquals('Null', $client->getDriver());
    }

    public function testLogDriverSetup()
    {
        $this->app['config']->set('sms.default', 'log');
        $client = $this->app->make('sms');
        $this->assertInstanceOf('Matthewbdaly\SMS\Client', $client);
        $this->assertEquals('Log', $client->getDriver());
    }

    public function testNexmoDriverSetup()
    {
        $this->app['config']->set('sms.default', 'nexmo');
        $this->app['config']->set('sms.drivers.nexmo.api_key', 'MY_NEXMO_API_KEY');
        $this->app['config']->set('sms.drivers.nexmo.api_secret', 'MY_NEXMO_API_SECRET');
        $client = $this->app->make('sms');
        $this->assertInstanceOf('Matthewbdaly\SMS\Client', $client);
        $this->assertEquals('Nexmo', $client->getDriver());
    }

    public function testClockworkDriverSetup()
    {
        $this->app['config']->set('sms.default', 'clockwork');
        $this->app['config']->set('sms.drivers.clockwork.api_key', 'MY_CLOCKWORK_API_KEY');
        $client = $this->app->make('sms');
        $this->assertInstanceOf('Matthewbdaly\SMS\Client', $client);
        $this->assertEquals('Clockwork', $client->getDriver());
    }

    public function testFacade()
    {
        $msg = [
            'to'      => '+44 01234 567890',
            'content' => 'Just testing',
        ];
        $mock = m::mock('Matthewbdaly\SMS\Client');
        $mock->shouldReceive('send')->with($msg)->once()->andReturn(true);
        $this->app->instance('sms', $mock);
        $this->assertInstanceOf('Matthewbdaly\SMS\Client', $this->app['sms']);
        SMS::send($msg);
    }
}
