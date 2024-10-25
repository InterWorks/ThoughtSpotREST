<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait Security
{
    /**
     * Transfers the ownership of one or several objects from one user to another.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/security/assign-change-author
     *
     * @param array $args
     *
     * @return bool|Response
     */
    public function assignChangeAuthor(array $args = []): bool|Response
    {
        // Set up call
        $url = 'security/metadata/assign';

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
     * Fetches object permission details for a given principal object such as a user and group.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/security/fetch-permissions-of-principals
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function fetchPermissionsOfPrincipals(array $args = []): array|Response
    {
        // Set up call
        $url = 'security/principals/fetch-permissions';

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
     * Fetches permission details for a given metadata object.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/security/fetch-permissions-on-metadata
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function fetchPermissionsOnMetadata(array $args = []): array|Response
    {
        // Set up call
        $url = 'security/metadata/fetch-permissions';

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
     * Allows sharing one or several metadata objects with users and groups in ThoughtSpot.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/security/share-metadata
     *
     * @param array $args
     *
     * @return bool|Response
     */
    public function shareMetadata(array $args = []): bool|Response
    {
        // Set up call
        $url = 'security/metadata/share';

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
