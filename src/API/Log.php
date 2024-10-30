<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait Log
{
    /**
     * Fetches security audit logs.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/log/fetch-logs
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function fetchLogs(array $args = []): mixed
    {
        // Set up call
        $url = 'logs/fetch';

        // Make the call
        $response = $this->call(
            url   : $url,
            args  : $args,
            method: 'POST'
        );

        // Return the response
        return $this->returnResponseObject
            ? $response
            : (array) $response->json();
    }
}
