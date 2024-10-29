<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait Metadata
{
    /**
     * Deletes a metadata object from ThoughtSpot.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/metadata/delete-metadata
     *
     * @param array $args
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
     * @param array $args
     *
     * @return array|Response
     */
    public function exportMetadataTML(array $args = []): array|Response
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
            : $response->json();
    }

    /**
     * Exports the TML representation of metadata objects in paginated batches.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/metadata/export-metadata-tml-batched
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function exportMetadataTMLBatched(array $args = []): array|Response
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
            : $response->json();
    }

    /**
     * Fetches the underlying SQL query data for an Answer object.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/metadata/fetch-answer-sql-query
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function fetchAnswerSQLQuery(array $args = []): array|Response
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
            : $response->json();
    }

    /**
     * Fetches the underlying SQL query data for a Liveboard object and its visualizations.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/metadata/fetch-liveboard-sql-query
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function fetchLiveboardSQLQuery(array $args = []): array|Response
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
            : $response->json();
    }

    /**
     * Imports objects into ThoughtSpot using TML.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/metadata/import-metadata-tml
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function importMetadataTML(array $args = []): array|Response
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
            : $response->json();
    }

    /**
     * Searches metadata such as Liveboards and Answers.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/metadata/search-metadata
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function searchMetadata(array $args = []): array|Response
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
            : $response->json();
    }
}
