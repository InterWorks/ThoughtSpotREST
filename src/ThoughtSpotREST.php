<?php

namespace InterWorks\ThoughtSpotREST;

use Exception;
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use InterWorks\ThoughtSpotREST\API\Authentication;
use InterWorks\ThoughtSpotREST\API\Connections;
use InterWorks\ThoughtSpotREST\API\CustomAction;
use InterWorks\ThoughtSpotREST\API\Data;
use InterWorks\ThoughtSpotREST\API\DBT;
use InterWorks\ThoughtSpotREST\API\Groups;
use InterWorks\ThoughtSpotREST\API\Log;
use InterWorks\ThoughtSpotREST\API\Metadata;
use InterWorks\ThoughtSpotREST\API\Orgs;
use InterWorks\ThoughtSpotREST\API\Reports;
use InterWorks\ThoughtSpotREST\API\Roles;
use InterWorks\ThoughtSpotREST\API\Schedules;
use InterWorks\ThoughtSpotREST\API\Security;
use InterWorks\ThoughtSpotREST\API\System;
use InterWorks\ThoughtSpotREST\API\Tags;
use InterWorks\ThoughtSpotREST\API\Users;
use InterWorks\ThoughtSpotREST\API\VersionControl;

class ThoughtSpotREST
{
    /**
     * API category traits.
     */
    use Authentication;
    use Connections;
    use CustomAction;
    use Data;
    use DBT;
    use Groups;
    use Log;
    use Metadata;
    use Orgs;
    use Reports;
    use Roles;
    use Schedules;
    use Security;
    use System;
    use Tags;
    use Users;
    use VersionControl;

    /**
     * Properties.
     */
    private string|null $authType;
    private string $authCacheKey;
    private string|null $cookies;
    private string|null $password;
    private bool $returnResponseObject;
    private string|null $secretKey;
    private string|null $token;
    private string|null $url;
    private string|null $username;

    /**
     * Constructor for the ThoughtSpotREST class.
     *
     * @return void
     */
    public function __construct(bool $returnResponseObject = false)
    {
        // Set the properties
        $this->authType             = config('thoughtspotrest.auth');
        $this->cookies              = null; // Set later depending on auth type
        $this->password             = config('thoughtspotrest.password');
        $this->returnResponseObject = $returnResponseObject;
        $this->secretKey            = config('thoughtspotrest.secret_key');
        $this->token                = null; // Set later depending on auth type
        $this->url                  = rtrim(config('thoughtspotrest.url'), '/');
        $this->username             = config('thoughtspotrest.username');

        // Validate the environment
        $this->_validateEnvironment();

        // Authenticated for subsequent API calls
        $this->_authenticate();
    }

    /**
     * Authenticates the user for subsequent API calls.
     *
     * @return void
     */
    private function _authenticate(): void
    {
        // Authenticate based on the auth type
        if ($this->authType === 'basic') {
            $this->_authenticateBasic();
        } elseif ($this->authType === 'trusted') {
            $this->_authenticateTrusted();
        } elseif ($this->authType === 'cookie') {
            $this->_authenticateCookie();
        } else {
            // An exception is thrown in the constructor it the auth type is invalid
        }
    }

    /**
     * Authenticates with "basic" authentication.
     *
     * @return void
     */
    private function _authenticateBasic(): void
    {
        // Check cache
        if (Cache::has($this->authCacheKey)) {
            $this->token = Cache::get($this->authCacheKey);
            return;
        }

        // Get a token
        $tokenResponse = $this->getFullAccessToken([
            'username' => $this->username,
            'password' => $this->password,
        ]);

        // Set the token
        $token       = $this->returnResponseObject
            ? $tokenResponse->json()['token']
            : $tokenResponse['token'];
        $this->token = $token;

        // Cache the token
        Cache::put($this->authCacheKey, $token, now()->addMinutes(5));
    }

    /**
     * Authenticates with "cookie" authentication.
     *
     * @return void
     */
    private function _authenticateCookie(): void
    {
        // Check cache
        if (Cache::has($this->authCacheKey)) {
            $this->cookies = Cache::get($this->authCacheKey);
            return;
        }

        // Get the cookies
        $response = $this->login([
            'username' => $this->username,
            'password' => $this->password,
        ]);

        // Set the cookies
        $cookies       = $this->returnResponseObject
            ? $this->processCookies($response->cookies())
            : $response;
        $this->cookies = $cookies;

        // Cache the cookies
        Cache::put($this->authCacheKey, $cookies, now()->addHours(3));
    }

    /**
     * Authenticates with "trusted" authentication.
     *
     * @return void
     */
    private function _authenticateTrusted(): void
    {
        // Check cache
        if (Cache::has($this->authCacheKey)) {
            $this->token = Cache::get($this->authCacheKey);
            return;
        }

        // Get a token
        $tokenResponse = $this->getFullAccessToken([
            'username'   => $this->username,
            'secret_key' => $this->secretKey,
        ]);

        // Set the token
        $token       = $this->returnResponseObject
            ? $tokenResponse->json()['token']
            : $tokenResponse['token'];
        $this->token = $token;

        // Cache the token
        Cache::put($this->authCacheKey, $token, now()->addMinutes(5));
    }

    /**
     * Calls a REST API.
     *
     * @throws Exception
     *
     * @param string      $url
     * @param array|null  $args
     * @param string|null $method
     *
     * @return Response
     */
    public function call(
        string $url,
        array $args = [],
        string $method = 'GET'
    ): Response {
        // Prepare URL
        $apiBase = '/api/rest/2.0/';
        $url     = $this->url . $apiBase . $url;

        // Prepare headers
        $headers = [
            'Content-Type' => 'application/json',
        ];
        if (!is_null($this->token)) {
            $headers['Authorization'] = 'Bearer ' . $this->token;
        }

        // Add cookies if they exist
        if (!is_null($this->cookies)) {
            $headers['Cookie'] = $this->cookies;
        }

        // Configure the call
        $call = Http::withHeaders($headers)
            ->timeout(60)
            ->withOptions(['verify' => false]);

        // Determine the request function
        $requestFunction = strtolower($method);

        // Make the call
        $response = $call->$requestFunction($url, $args);

        // Catch errors
        if ($response->failed() && !$this->returnResponseObject) {
            // Redact these args
            $redactThese = [
                'Authorization',
                'password',
                'principalid',
                'secret_key',
            ];
            foreach ($redactThese as $redactThis) {
                if (array_key_exists($redactThis, $args)) {
                    $args[$redactThis] = 'REDACTED';
                }
            }

            throw new Exception(
                'Failed to make a REST API call. '
                . 'URL: ' . $url . '. '
                . 'Method: ' . $method . '. '
                . 'Args: ' . json_encode($args) . '. '
                . 'Status: ' . $response->status() . '. '
                . 'Response: ' . $response->body()
            );
        }

        // Return the response object
        return $response;
    }

    /**
     * Get the auth type for this instance.
     *
     * @return string
     */
    public function getAuthType(): string
    {
        return $this->authType;
    }

    /**
     * Get the password for this instance.
     *
     * @return string|null
     */
    public function getPassword(): string|null
    {
        return $this->password;
    }

    /**
     * Get whether this instances returns the response object.
     *
     * @return bool
     */
    public function getReturnResponseObject(): bool
    {
        return $this->returnResponseObject;
    }

    /**
     * Get the secret key for this instance.
     *
     * @return string|null
     */
    public function getSecretKey(): string|null
    {
        return $this->secretKey;
    }

    /**
     * Get the token for this instance.
     *
     * @return string|null
     */
    public function getToken(): string|null
    {
        return $this->token;
    }

    /**
     * Get the username for this instance.
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Processes cookies into string for use in headers.
     *
     * @param CookieJar $cookies
     *
     * @return string
     */
    public function processCookies(CookieJar $cookies): string
    {
        // Get clientId and JSESSIONID in name => value format
        $keep       = ['clientId', 'JSESSIONID'];
        $cookiesStr = '';
        foreach ($cookies as $cookie) {
            if (in_array($cookie->getName(), $keep)) {
                $cookiesStr .= $cookie->getName() . '=' . $cookie->getValue() . '; ';
            }
        }

        // Trim the trailing semicolon and space
        $cookiesStr = rtrim($cookiesStr, '; ');

        // Return the cookies
        return $cookiesStr;
    }

    /**
     * Set the auth type for this instance.
     *
     * @param string $authType
     *
     * @return void
     */
    public function setAuthType(string $authType): void
    {
        $this->authType = $authType;

        // Validate the environment
        $this->_validateEnvironment();

        // Re-authenticate
        $this->_authenticate();
    }

    /**
     * Set the password for this instance.
     *
     * @param string $password
     *
     * @return void
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;

        // Validate the environment
        $this->_validateEnvironment();

        // Re-authenticate
        $this->_authenticate();
    }

    /**
     * Set whether this instance returns the response object.
     *
     * @param bool $returnResponseObject
     *
     * @return void
     */
    public function setReturnResponseObject(bool $returnResponseObject): void
    {
        $this->returnResponseObject = $returnResponseObject;
    }

    /**
     * Set the secret key for this instance.
     *
     * @param string $secretKey
     *
     * @return void
     */
    public function setSecretKey(string $secretKey): void
    {
        $this->secretKey = $secretKey;

        // Validate the environment
        $this->_validateEnvironment();

        // Re-authenticate
        $this->_authenticate();
    }

    /**
     * Set the username for this instance.
     *
     * @param string $username
     *
     * @return void
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;

        // Validate the environment
        $this->_validateEnvironment();

        // Re-authenticate
        $this->_authenticate();
    }

    /**
     * Validates the required environment variables are present.
     *
     * @throws Exception
     *
     * @return void
     */
    private function _validateEnvironment(): void
    {
        // Check for valid auth type
        if (!in_array($this->authType, ['basic', 'trusted', 'cookie'])) {
            throw new Exception(
                'The ThoughtSpot auth type is not valid. '
                . 'Change THOUGHTSPOT_REST_AUTH to "basic", "trusted", or "cookie" in your .env file.'
            );
        }

        // If the URL is null, throw an exception
        if (empty($this->url)) {
            throw new Exception(
                'The ThoughtSpot URL is not set. '
                . 'Add THOUGHTSPOT_REST_URL to your .env file.'
            );
        }

        // If the username is null, throw an exception
        if (is_null($this->username)) {
            throw new Exception(
                'The ThoughtSpot username is not set. '
                . 'Add THOUGHTSPOT_REST_USERNAME to your .env file.'
            );
        }

        // If the auth type is "cookie" or "basic", check for a password
        if (in_array($this->authType, ['cookie', 'basic']) && is_null($this->password)) {
            throw new Exception(
                'The ThoughtSpot password is not set and is required for '
                . $this->authType . ' authentication. '
                . 'Add THOUGHTSPOT_REST_PASSWORD to your .env file.'
            );
        }

        // If the auth type is "trusted", check for a secret key
        if ($this->authType === 'trusted' && is_null($this->secretKey)) {
            throw new Exception(
                'The ThoughtSpot secret key is not set and is required for trusted authentication. '
                . 'Add THOUGHTSPOT_REST_SECRET_KEY to your .env file.'
            );
        }

        // Set the auth cache key
        $this->authCacheKey = 'thoughtspotrest-auth'
            . '-' . $this->authType
            . '-' . $this->username
            . '-' . ($this->password ?? 'null')
            . '-' . ($this->secretKey ?? 'null');
    }
}
