<?php

namespace InterWorks\ThoughtSpotREST\Tests;

use InterWorks\ThoughtSpotREST\ThoughtSpotRESTServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function defineEnvironment($app)
    {
        // Setup default database to use sqlite :memory:
        tap($app['config'], function (Repository $config) {
            $config->set('thoughtspotrest.auth', 'basic');
            $config->set('thoughtspotrest.password', 'password');
            $config->set('thoughtspotrest.url', 'https://example.thoughtspot.com');
            $config->set('thoughtspotrest.username', 'username');
        });
    }

    protected function getPackageProviders($app)
    {
        return [
            ThoughtSpotRESTServiceProvider::class,
        ];
    }
}
