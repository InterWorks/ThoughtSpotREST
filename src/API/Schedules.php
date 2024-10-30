<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait Schedules
{
    /**
     * Creates a Liveboard scheduled job.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/schedules/create-schedule
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function createSchedule(array $args = []): mixed
    {
        // Set up call
        $url = 'schedules/create';

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
     * Deletes a Liveboard scheduled job.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/schedules/delete-schedule
     *
     * @param string $scheduleIdentifier
     *
     * @return bool|Response
     */
    public function deleteSchedule(string $scheduleIdentifier): bool|Response
    {
        // Set up call
        $url = "schedules/$scheduleIdentifier/delete";

        // Make the call
        $response = $this->call(
            url   : $url,
            method: 'POST'
        );

        // Return the response
        return $this->returnResponseObject
            ? $response
            : $response->successful();
    }

    /**
     * Get a list of Liveboard scheduled jobs.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/schedules/search-schedules
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function searchSchedules(array $args = []): mixed
    {
        // Set up call
        $url = 'schedules/search';

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
     * Updates a Liveboard scheduled job.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/schedules/update-schedule
     *
     * @param string               $scheduleIdentifier
     * @param array<string, mixed> $args
     *
     * @return bool|Response
     */
    public function updateSchedule(string $scheduleIdentifier, array $args = []): bool|Response
    {
        // Set up call
        $url = "schedules/$scheduleIdentifier/update";

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
