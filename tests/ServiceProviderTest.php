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

    public function testDefaultDriverSetup()
    {
        $client = $this->app->make('sms');
        $this->assertInstanceOf('Matthewbdaly\SMS\Client', $client);
        $this->assertEquals('Log', $client->getDriver());
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

    public function testTextLocalDriverSetup()
    {
        $this->app['config']->set('sms.default', 'textlocal');
        $this->app['config']->set('sms.drivers.textlocal.api_key', 'MY_TEXTLOCAL_API_KEY');
        $client = $this->app->make('sms');
        $this->assertInstanceOf('Matthewbdaly\SMS\Client', $client);
        $this->assertEquals('TextLocal', $client->getDriver());
    }

    public function testRequestBinDriverSetup()
    {
        $this->app['config']->set('sms.default', 'requestbin');
        $this->app['config']->set('sms.drivers.requestbin.path', 'REQUESTBIN_PATH');
        $client = $this->app->make('sms');
        $this->assertInstanceOf('Matthewbdaly\SMS\Client', $client);
        $this->assertEquals('RequestBin', $client->getDriver());
    }

    public function testAwsSnsDriverSetup()
    {
        $this->app['config']->set('sms.default', 'aws');
        $this->app['config']->set('sms.drivers.aws.api_key', 'MY_AWS_SNS_API_KEY');
        $this->app['config']->set('sms.drivers.aws.api_secret', 'MY_AWS_SNS_API_SECRET');
        $this->app['config']->set('sms.drivers.aws.api_region', 'MY_AWS_SNS_API_REGION');
        $client = $this->app->make('sms');
        $this->assertInstanceOf('Matthewbdaly\SMS\Client', $client);
        $this->assertEquals('Aws', $client->getDriver());
    }

    public function testTwilioDriverSetup()
    {
        $this->app['config']->set('sms.default', 'twilio');
        $this->app['config']->set('sms.drivers.aws.account_id', 'MY_TWILIO_ACCOUNT_ID');
        $this->app['config']->set('sms.drivers.aws.api_token', 'MY_TWILIO_API_TOKEN');
        $client = $this->app->make('sms');
        $this->assertInstanceOf('Matthewbdaly\SMS\Client', $client);
        $this->assertEquals('Twilio', $client->getDriver());
    }

    public function testMailDriverSetup()
    {
        $this->app['config']->set('sms.default', 'mail');
        $this->app['config']->set('sms.drivers.mail.domain', 'my.sms-gateway.com');
        $client = $this->app->make('sms');
        $this->assertInstanceOf('Matthewbdaly\SMS\Client', $client);
        $this->assertEquals('Mail', $client->getDriver());
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

    public function testInject()
    {
        $client = $this->app->make('Matthewbdaly\SMS\Contracts\Client');
        $this->assertInstanceOf('Matthewbdaly\SMS\Contracts\Client', $client);
        $this->assertInstanceOf('Matthewbdaly\SMS\Client', $client);
    }
}
