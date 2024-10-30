<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait Authentication
{
    /**
     * Gets session information for the currently logged-in user.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/authentication/get-current-user-info
     *
     * @return mixed[]|Response
     */
    public function getCurrentUserInfo(): mixed
    {
        // Set up call
        $url = 'auth/session/user';

        // Make the call
        $response = $this->call(
            url   : $url,
            method: 'GET'
        );

        // Return the response
        return $this->returnResponseObject
            ? $response
            : (array) $response->json();
    }

    /**
     * Gets token details for the currently logged-in user.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/authentication/get-current-user-token
     *
     * @return mixed[]|Response
     */
    public function getCurrentUserToken(): mixed
    {
        // Set up call
        $url = 'auth/session/token';

        // Make the call
        $response = $this->call(
            url   : $url,
            method: 'GET'
        );

        // Return the response
        return $this->returnResponseObject
            ? $response
            : (array) $response->json();
    }

    /**
     * Gets a full access token to use for subsequent API calls or embedded auth.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http%2Fapi-endpoints%2Fauthentication%2Fget-full-access-token
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function getFullAccessToken(array $args = []): array|Response
    {
        // Set up call
        $url = 'auth/token/full';

        // Make the call
        $response = $this->call(
            url   : $url,
            args  : $args,
            method: 'POST'
        );

        // Return the token
        return $this->returnResponseObject
            ? $response
            : (array) $response->json();
    }

    /**
     * Gets an object access token that provides access to a specific object.
     * NOTE: ThoughtSpot has recommended using full access tokens for embedding instead.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/authentication/get-object-access-token
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function getObjectAccessToken(array $args = []): mixed
    {
        // Set up call
        $url = 'auth/token/object';

        // Make the call
        $response = $this->call(
            url   : $url,
            args  : $args,
            method: 'POST'
        );

        // Return the token
        return $this->returnResponseObject
            ? $response
            : (array) $response->json();
    }

    /**
     * Creates a login session for a ThoughtSpot user with Basic authentication.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/authentication/login
     *
     * @param array<string, mixed> $args
     *
     * @return string|Response
     */
    public function login(array $args): string|Response
    {
        // Set up call
        $url = 'auth/session/login';

        // Make the call
        $response = $this->call(
            url   : $url,
            args  : $args,
            method: 'POST'
        );

        // Return the response
        return $this->returnResponseObject
            ? $response
            : $this->processCookies($response->cookies());
    }

    /**
     * Logs out the currently logged-in user.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/authentication/logout
     *
     * @return bool|Response
     */
    public function logout(): bool|Response
    {
        // Set up call
        $url = 'auth/session/logout';

        // Make the call
        $response = $this->call(
            url   : $url,
            method: 'POST'
        );

        // Return true if successful
        return $this->returnResponseObject
            ? $response
            : $response->successful();
    }

    /**
     * Revokes the authentication token issues for the current user session.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/authentication/revoke-token
     *
     * @param array<string, mixed> $args
     *
     * @return bool|Response
     */
    public function revokeToken(array $args = []): bool|Response
    {
        // Set up call
        $url = 'auth/token/revoke';

        // Make the call
        $response = $this->call(
            url   : $url,
            args  : $args,
            method: 'POST'
        );

        // Return true if successful
        return $this->returnResponseObject
            ? $response
            : $response->successful();
    }

    /**
     * Validates the authentication token.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/authentication/validate-token
     *
     * @param array<string, mixed> $args
     *
     * @return bool|Response
     */
    public function validateToken(array $args = []): bool|Response
    {
        // Set up call
        $url = 'auth/token/validate';

        // Make the call
        $response = $this->call(
            url   : $url,
            args  : $args,
            method: 'POST'
        );

        // Return true if successful
        return $this->returnResponseObject
            ? $response
            : $response->successful();
    }
}
