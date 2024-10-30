<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait Metadata
{
    /**
     * Deletes a metadata object from ThoughtSpot.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/metadata/delete-metadata
     *
     * @param array<string, mixed> $args
     *
     * @return bool|Response
     */
    public function deleteMetadata(array $args = []): bool|Response
    {
        // Set up call
        $url = 'metadata/delete';

        // Make the call
        $response = $this->call(
            url   : $url,
            args  : $args,
            method: 'DELETE'
        );

        // Return the response
        return $this->returnResponseObject
            ? $response
            : $response->successful();
    }

    /**
     * Exports the TML representation of metadata objects.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/metadata/export-metadata-tml
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function exportMetadataTML(array $args = []): mixed
    {
        // Set up call
        $url = 'metadata/tml/export';

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
     * Exports the TML representation of metadata objects in paginated batches.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/metadata/export-metadata-tml-batched
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function exportMetadataTMLBatched(array $args = []): mixed
    {
        // Set up call
        $url = 'metadata/tml/export/batch';

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
     * Fetches the underlying SQL query data for an Answer object.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/metadata/fetch-answer-sql-query
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function fetchAnswerSQLQuery(array $args = []): mixed
    {
        // Set up call
        $url = 'metadata/answer/sql';

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
     * Fetches the underlying SQL query data for a Liveboard object and its visualizations.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/metadata/fetch-liveboard-sql-query
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function fetchLiveboardSQLQuery(array $args = []): mixed
    {
        // Set up call
        $url = 'metadata/liveboard/sql';

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
     * Imports objects into ThoughtSpot using TML.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/metadata/import-metadata-tml
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function importMetadataTML(array $args = []): mixed
    {
        // Set up call
        $url = 'metadata/tml/import';

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
     * Searches metadata such as Liveboards and Answers.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/metadata/search-metadata
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function searchMetadata(array $args = []): mixed
    {
        // Set up call
        $url = 'metadata/search';

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
