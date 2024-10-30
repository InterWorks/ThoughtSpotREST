<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait Orgs
{
    /**
     * Creates an Org for the ThoughtSpot cluster.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/orgs/create-org
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function createOrg(array $args = []): mixed
    {
        // Set up call
        $url = 'orgs/create';

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
     * Deletes an Org for the ThoughtSpot cluster.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/orgs/delete-org
     *
     * @param int|string           $orgIdentifier
     * @param array<string, mixed> $args
     *
     * @return bool|Response
     */
    public function deleteOrg(int|string $orgIdentifier, array $args = []): bool|Response
    {
        // Set up call
        $url = "orgs/$orgIdentifier/delete";

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
     * Gets a list of Orgs for the ThoughtSpot cluster.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/orgs/search-orgs
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function searchOrgs(array $args = []): mixed
    {
        // Set up call
        $url = 'orgs/search';

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
     * Updates an Org for the ThoughtSpot cluster.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/orgs/update-org
     *
     * @param int|string           $orgIdentifier
     * @param array<string, mixed> $args
     *
     * @return bool|Response
     */
    public function updateOrg(int|string $orgIdentifier, array $args = []): bool|Response
    {
        // Set up call
        $url = "orgs/$orgIdentifier/update";

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
