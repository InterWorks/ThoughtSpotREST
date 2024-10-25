<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait Connections
{
    /**
     * Creates a connection to a data warehouse.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/connections/create-connection
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function createConnection(array $args = []): array|Response
    {
        // Set up call
        $url = 'connection/create';

        // Make the call
        $response = $this->call(
            url   : $url,
            args  : $args,
            method: 'POST'
        );

        // Return the response
        return $this->returnResponseObject
            ? $response
            : $response->json();
    }

    /**
     * Deletes a connection object.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/connections/delete-connection
     *
     * @param array $args
     *
     * @return bool|Response
     */
    public function deleteConnection(array $args = []): bool|Response
    {
        // Set up call
        $url = 'connection/delete';

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

    /**
     * Exports the difference in connection metadata between CDW and ThoughtSpot.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/connections/download-connection-metadata-changes
     *
     * @param string $connectionIdentifier
     *
     * @return string|Response
     */
    public function downloadConnectionMetadataChanges(string $connectionIdentifier): string|Response
    {
        // Set up call
        $url = "connections/download-connection-metadata-changes/$connectionIdentifier";

        // Make the call
        $response = $this->call(
            url   : $url,
            method: 'POST'
        );

        // Return the response
        return $this->returnResponseObject
            ? $response
            : $response->body();
    }

    /**
     * Validates the difference in connection metadata between CDW and ThoughtSpot.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/connections/fetch-connection-diff-status
     *
     * @param string $connectionIdentifier
     *
     * @return array|Response
     */
    public function fetchConnectionDiffStatus(string $connectionIdentifier): array|Response
    {
        // Set up call
        $url = "connections/fetch-connection-diff-status/$connectionIdentifier";

        // Make the call
        $response = $this->call(
            url   : $url,
            method: 'POST'
        );

        // Return the response
        return $this->returnResponseObject
            ? $response
            : $response->json();
    }

    /**
     * Gets data connection objects.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/connections/search-connection
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function searchConnection(array $args = []): array|Response
    {
        // Set up call
        $url = 'connection/search';

        // Make the call
        $response = $this->call(
            url   : $url,
            args  : $args,
            method: 'POST'
        );

        // Return the response
        return $this->returnResponseObject
            ? $response
            : $response->json();
    }

    /**
     * Updates a connection object.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/connections/update-connection
     *
     * @param array $args
     *
     * @return bool|Response
     */
    public function updateConnection(array $args = []): bool|Response
    {
        // Set up call
        $url = 'connection/update';

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
