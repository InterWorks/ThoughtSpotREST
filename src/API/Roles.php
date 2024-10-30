<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait Roles
{
    /**
     * Create a role.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/roles/create-role
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function createRole(array $args = []): mixed
    {
        // Set up call
        $url = 'roles/create';

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
     * Delete a role.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/roles/delete-role
     *
     * @param string $roleIdentifier
     *
     * @return bool|Response
     */
    public function deleteRole(string $roleIdentifier): bool|Response
    {
        // Set up call
        $url = "roles/$roleIdentifier/delete";

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
     * Gets Roles configured on a ThoughtSpot instance.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/roles/search-roles
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function searchRoles(array $args = []): mixed
    {
        // Set up call
        $url = 'roles/search';

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
     * Update a role.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/roles/update-role
     *
     * @param string               $roleIdentifier
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function updateRole(string $roleIdentifier, array $args = []): mixed
    {
        // Set up call
        $url = "roles/$roleIdentifier/update";

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
