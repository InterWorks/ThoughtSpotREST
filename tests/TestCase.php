<?php

namespace InterWorks\ThoughtSpotREST\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            \Interworks\ThoughtSpotREST\ThoughtSpotRESTServiceProvider::class,
        ];
    }
}
