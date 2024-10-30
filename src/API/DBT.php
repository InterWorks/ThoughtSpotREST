<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait DBT
{
    /**
     * Creates a DBT connection object in ThoughtSpot.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/dbt/dbt-connection
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function createDBTConnection(array $args = []): mixed
    {
        // Set up call
        $url = 'dbt/dbt-connection';

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

    /**
     * Deletes a DBT connection object in ThoughtSpot.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/dbt/delete-dbt-connection
     *
     * @param string               $connectionIdentifier
     * @param array<string, mixed> $args
     *
     * @return bool|Response
     */
    public function deleteDBTConnection(string $connectionIdentifier, array $args = []): bool|Response
    {
        // Set up call
        $url = "dbt/$connectionIdentifier/delete";

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
     * Generates sync TML for a DBT connection.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/dbt/dbt-generate-sync-tml
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function generateDBTSyncTML(array $args = []): mixed
    {
        // Set up call
        $url = 'dbt/generate-sync-tml';

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

    /**
     * Gets TML for a DBT connection object.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/dbt/dbt-generate-tml
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function generateDBTTML(array $args = []): mixed
    {
        // Set up call
        $url = 'dbt/generate-tml';

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

    /**
     * Searches for DBT connection objects.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/dbt/dbt-search
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function searchDBTConnections(array $args = []): mixed
    {
        // Set up call
        $url = 'dbt/search';

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

    /**
     * Updates a DBT connection object in ThoughtSpot.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/dbt/update-dbt-connection
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function updateDBTConnection(array $args = []): mixed
    {
        // Set up call
        $url = 'dbt/update-dbt-connection';

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
