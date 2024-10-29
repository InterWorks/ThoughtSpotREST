<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait Data
{
    /**
     * Fetches data from a saved Answer.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/data/fetch-answer-data
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function fetchAnswerData(array $args = []): array|Response
    {
        // Set up call
        $url = 'metadata/answer/data';

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
     * Gets data from a Liveboard object and its visualization.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/data/fetch-liveboard-data
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function fetchLiveboardData(array $args = []): array|Response
    {
        // Set up call
        $url = 'metadata/liveboard/data';

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
     * Generates an Answer from a given data source.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/data/search-data
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function searchData(array $args = []): array|Response
    {
        // Set up call
        $url = 'searchdata';

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
