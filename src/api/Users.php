<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait Users
{
    /**
     * Activates a deactivated user account.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/users/activate-user
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function activateUser(array $args): array|Response
    {
        // Set up call
        $url = 'users/activate';

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
     * Updates the password for the current user.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/users/change-user-password
     *
     * @param array $args
     *
     * @return bool|Response
     */
    public function changeUserPassword(array $args): bool|Response
    {
        // Set up call
        $url = 'users/change-password';

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
     * Creates a user in ThoughtSpot.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/users/create-user
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function createUser(array $args): array|Response
    {
        // Set up call
        $url = 'users/create';

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
     * Deactivates a user account.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/users/deactivate-user
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function deactivateUser(array $args): array|Response
    {
        // Set up call
        $url = 'users/deactivate';

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
     * Deletes a user from ThoughtSpot.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/users/delete-user
     *
     * @param string $userIdentifier
     *
     * @return bool|Response
     */
    public function deleteUser(string $userIdentifier): bool|Response
    {
        // Set up call
        $url = "users/$userIdentifier/delete";

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
     * Forces logout on current user sessions.
     * NOTE: If no arguments are provided, all user sessions will be logged out.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/users/force-logout-users
     *
     * @param array $args
     *
     * @return bool|Response
     */
    public function forceLogoutUsers(array $args = []): bool|Response
    {
        // Set up call
        $url = 'users/force-logout';

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
     * Imports users into ThoughtSpot.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/users/import-users
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function importUsers(array $args): array|Response
    {
        // Set up call
        $url = 'users/import';

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
     * Resets the password for a user in ThoughtSpot.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/users/reset-user-password
     *
     * @param array $args
     *
     * @return bool|Response
     */
    public function resetUserPassword(array $args): bool|Response
    {
        // Set up call
        $url = 'users/reset-password';

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
     * Gets a list of users available on the ThoughtSpot system.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/users/search-users
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function searchUsers(array $args = []): array|Response
    {
        // Set up call
        $url = 'users/search';

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
     * Updates a user in ThoughtSpot.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/users/update-user
     *
     * @param string $userIdentifier
     * @param array  $args
     *
     * @return bool|Response
     */
    public function updateUser(string $userIdentifier, array $args): bool|Response
    {
        // Set up call
        $url = "users/$userIdentifier/update";

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
