<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait Tags
{
    /**
     * Assigns a tag to an object.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/tags/assign-tag
     *
     * @param array $args
     *
     * @return bool|Response
     */
    public function assignTag(array $args = []): bool|Response
    {
        // Set up call
        $url = 'tags/assign';

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
     * Creates a tag on the ThoughtSpot cluster.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/tags/create-tag
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function createTag(array $args = []): array|Response
    {
        // Set up call
        $url = 'tags/create';

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
     * Deletes a tag on the ThoughtSpot cluster.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/tags/delete-tag
     *
     * @param string $tagIdentifier
     * @param array  $args
     *
     * @return bool|Response
     */
    public function deleteTag(string $tagIdentifier, array $args = []): bool|Response
    {
        // Set up call
        $url = "tags/$tagIdentifier/delete";

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
     * Gets a list of tags available on the ThoughtSpot cluster.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/tags/search-tags
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function searchTags(array $args = []): array|Response
    {
        // Set up call
        $url = 'tags/search';

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
     * Unassigns a tag from an object.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/tags/unassign-tag
     *
     * @param array $args
     *
     * @return bool|Response
     */
    public function unassignTag(array $args = []): bool|Response
    {
        // Set up call
        $url = 'tags/unassign';

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
     * Updates a tag on the ThoughtSpot cluster.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/tags/update-tag
     *
     * @param string $tagIdentifier
     * @param array  $args
     *
     * @return bool|Response
     */
    public function updateTag(string $tagIdentifier, array $args = []): bool|Response
    {
        // Set up call
        $url = "tags/$tagIdentifier/update";

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
