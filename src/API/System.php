<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait System
{
    /**
     * Gets the cluster system configuration information.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/system/get-system-config
     *
     * @return mixed[]|Response
     */
    public function getSystemConfig(): mixed
    {
        // Set up call
        $url = 'system/config';

        // Make the call
        $response = $this->call(
            url   : $url,
            method: 'GET'
        );

        // Return the response
        return $this->returnResponseObject
            ? $response
            : (array) $response->json();
    }

    /**
     * Gets the ThoughtSpot system information.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/system/get-system-information
     *
     * @return mixed[]|Response
     */
    public function getSystemInformation(): mixed
    {
        // Set up call
        $url = 'system';

        // Make the call
        $response = $this->call(
            url   : $url,
            method: 'GET'
        );

        // Return the response
        return $this->returnResponseObject
            ? $response
            : (array) $response->json();
    }

    /**
     * Gets the ThoughtSpot system configuration applied overrides.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/system/get-system-override-info
     *
     * @return mixed[]|Response
     */
    public function getSystemOverrideInfo(): mixed
    {
        // Set up call
        $url = 'system/config-overrides';

        // Make the call
        $response = $this->call(
            url   : $url,
            method: 'GET'
        );

        // Return the response
        return $this->returnResponseObject
            ? $response
            : (array) $response->json();
    }

    /**
     * Updates the ThoughtSpot system configuration.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/system/update-system-config
     *
     * @param array<string, mixed> $args
     *
     * @return bool|Response
     */
    public function updateSystemConfig(array $args): bool|Response
    {
        // Set up call
        $url = 'system/config-update';

        // Make the call
        $response = $this->call(
            url   : $url,
            args  : $args,
            method: 'POST'
        );

        // Return the response
        return $this->returnResponseObject
            ? $response
            : $response->successful();
    }
}
