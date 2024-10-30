<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait CustomAction
{
    /**
     * Creates a custom action that appears as a menu action on a saved Answer or Liveboard visualization.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/custom-action/create-custom-action
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function createCustomAction(array $args = []): mixed
    {
        // Set up call
        $url = 'customization/custom-actions';

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
     * Deletes a custom action.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/custom-action/delete-custom-action
     *
     * @param string $customActionIdentifier
     *
     * @return bool|Response
     */
    public function deleteCustomAction(string $customActionIdentifier): bool|Response
    {
        // Set up call
        $url = "customization/custom-actions/$customActionIdentifier/delete";

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
     * Gets custom actions configured on the cluster.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/custom-action/search-custom-actions
     *
     * @param array<string, mixed> $args
     *
     * @return mixed[]|Response
     */
    public function searchCustomActions(array $args = []): mixed
    {
        // Set up call
        $url = 'customization/custom-actions/search';

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
     * Updates a custom action.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/custom-action/update-custom-action
     *
     * @param string               $customActionIdentifier
     * @param array<string, mixed> $args
     *
     * @return bool|Response
     */
    public function updateCustomAction(string $customActionIdentifier, array $args = []): bool|Response
    {
        // Set up call
        $url = "customization/custom-actions/$customActionIdentifier/update";

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
