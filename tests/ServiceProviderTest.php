<?php

namespace Tests;

class ServiceProviderTest extends TestCase
{
    public function testNullDriverSetup()
    {
        eval(\Psy\Sh());
    }
}
