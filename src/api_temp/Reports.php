<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait Reports
{
    /**
     * Exports an Answer in the given file format.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/reports/export-answer-report
     *
     * @param array $args
     *
     * @return string|Response
     */
    public function exportAnswerReport(array $args = []): string|Response
    {
        // Set up call
        $url = 'report/answer';

        // Make the call
        $response = $this->call(
            url   : $url,
            args  : $args,
            method: 'POST'
        );

        // Return the response
        return $this->returnResponseObject
            ? $response
            : $response->body();
    }

    /**
     * Exports the data from a Liveboard and its visualization in a given file format.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/reports/export-liveboard-report
     *
     * @param array $args
     *
     * @return string|Response
     */
    public function exportLiveboardReport(array $args = []): string|Response
    {
        // Set up call
        $url = 'report/liveboard';

        // Make the call
        $response = $this->call(
            url   : $url,
            args  : $args,
            method: 'POST'
        );

        // Return the response
        return $this->returnResponseObject
            ? $response
            : $response->body();
    }
}
