<?php

namespace InterWorks\ThoughtSpotREST\API;

use Illuminate\Http\Client\Response;

trait VersionControl
{
    /**
     * Commits TML files of metadata objects to the Git branch configured on your instance.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/version-control/commit-branch
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function commitBranch(array $args = []): array|Response
    {
        // Set up call
        $url = 'vcs/git/branches/commit';

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
     * Connects the ThoughtSpot instance to a Git repository.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/version-control/create-config
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function createConfig(array $args = []): array|Response
    {
        // Set up call
        $url = 'vcs/git/config/create';

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
     * Deletes Git repository configuration from your ThoughtSpot instance.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/version-control/delete-config
     *
     * @param array $args
     *
     * @return bool|Response
     */
    public function deleteConfig(array $args = []): bool|Response
    {
        // Set up call
        $url = 'vcs/git/config/delete';

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
     * Deploys a commit and publish TML content to your ThoughtSpot instance.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/version-control/deploy-commit
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function deployCommit(array $args = []): array|Response
    {
        // Set up call
        $url = 'vcs/git/commits/deploy';

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
     * Reverts TML objects to a previous commit specified in the API request.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/version-control/revert-commit
     *
     * @param string $commitID
     * @param array  $args
     *
     * @return array|Response
     */
    public function revertCommit(string $commitID, array $args = []): array|Response
    {
        // Set up call
        $url = "vcs/git/commits/$commitID/revert";

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
     * Gets a list of commits for a given metadata object.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/version-control/search-commits
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function searchCommits(array $args = []): array|Response
    {
        // Set up call
        $url = 'vcs/git/commits/search';

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
     * Gets Git repository connections configured on the ThoughtSpot instance.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/version-control/search-config
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function searchConfig(array $args = []): array|Response
    {
        // Set up call
        $url = 'vcs/git/config/search';

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
     * Updates Git repository configuration settings.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/version-control/update-config
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function updateConfig(array $args = []): array|Response
    {
        // Set up call
        $url = 'vcs/git/config/update';

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
     * Validates the content of your source branch against the objects in your destination environment.
     * https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/api-endpoints/version-control/validate-merge
     *
     * @param array $args
     *
     * @return array|Response
     */
    public function validateMerge(array $args = []): array|Response
    {
        // Set up call
        $url = 'vcs/git/branches/validate';

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
}
