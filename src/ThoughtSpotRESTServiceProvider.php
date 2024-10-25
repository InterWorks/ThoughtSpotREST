<?php

namespace InterWorks\ThoughtSpotREST;

use Illuminate\Support\ServiceProvider;
use InterWorks\ThoughtSpotREST\API\Authentication;
use InterWorks\ThoughtSpotREST\API\Metadata;
use InterWorks\ThoughtSpotREST\API\ThoughtSpotREST;

class ThoughtSpotRESTServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->registerConfig();
    }

    /**
     * Merges the configuration file with the application's configuration.
     */
    public function registerConfig(): void
    {
        $config = __DIR__ . '/../config/thoughtspotrest.php';

        $this->publishes([$config => config_path('thoughtspotrest.php')]);

        $this->mergeConfigFrom($config, 'thoughtspotrest');
    }
}
