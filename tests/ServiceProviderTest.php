<?php

namespace Tests;

class ServiceProviderTest extends TestCase
{
    public function testNullDriverSetup()
    {
        $this->app['config']->set('sms.driver', 'null');
    }
}
