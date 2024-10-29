<?php

namespace InterWorks\ThoughtSpotREST\Tests;

use InterWorks\ThoughtSpotREST\ThoughtSpotRESTServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            ThoughtSpotRESTServiceProvider::class,
        ];
    }
}
