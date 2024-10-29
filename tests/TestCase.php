<?php

namespace Tests;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            \Interworks\ThoughtSpotREST\ThoughtSpotRESTServiceProvider::class,
        ];
    }

    public function test_basic_functionality()
    {
        $this->assertTrue(true);
    }
}
