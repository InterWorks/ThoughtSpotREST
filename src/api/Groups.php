<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait Groups
{
    /**
     * Creates a group on the ThoughtSpot cluster.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/groups/create-user-group
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function createUserGroup(array $args = []): array|Response
    {
        // Set up call
        $url = 'groups/create';

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
     * Deletes a group from the ThoughtSpot cluster.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/groups/delete-user-group
     *
     * @param string $groupIdentifier
     * @param array  $args
     *
     * @return bool|Response
     */
    public function deleteUserGroup(string $groupIdentifier, array $args = []): bool|Response
    {
        // Set up call
        $url = "groups/$groupIdentifier/delete";

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
     * Imports groups into the ThoughtSpot cluster.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/groups/import-user-groups
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function importUserGroups(array $args = []): array|Response
    {
        // Set up call
        $url = 'groups/import';

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
     * Gets a list of groups from the ThoughtSpot cluster.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/groups/search-user-groups
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function searchUserGroups(array $args = []): array|Response
    {
        // Set up call
        $url = 'groups/search';

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
     * Updates a group on the ThoughtSpot cluster.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/groups/update-user-group
     *
     * @param string $groupIdentifier
     * @param array  $args
     *
     * @return bool|Response
     */
    public function updateUserGroup(string $groupIdentifier, array $args = []): bool|Response
    {
        // Set up call
        $url = "groups/$groupIdentifier/update";

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
