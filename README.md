<a href="https://github.com/InterWorks/ThoughtSpotREST/actions"><img alt="GitHub Workflow Status (Pest)" src="https://img.shields.io/github/actions/workflow/status/InterWorks/ThoughtSpotREST/pest.yml?branch=main&label=Pest&style=round-square"></a>
<a href="https://github.com/InterWorks/ThoughtSpotREST/actions"><img alt="GitHub Workflow Status (PHPStan)" src="https://img.shields.io/github/actions/workflow/status/InterWorks/ThoughtSpotREST/phpstan.yml?branch=main&label=PHPStan&style=round-square"></a>
<a href="https://packagist.org/packages/InterWorks/ThoughtSpotREST"><img alt="Latest Version" src="https://img.shields.io/packagist/v/InterWorks/ThoughtSpotREST"></a>
<a href="https://packagist.org/packages/InterWorks/ThoughtSpotREST"><img alt="License" src="https://img.shields.io/github/license/InterWorks/ThoughtSpotREST"></a>

# ThoughtSpot REST API for Laravel

This is a simple API for calling REST API's against your ThoughtSpot cluster. It handles authentication for you so install, add the environment variables, and start making REST API calls!

## Getting Started

### Installation

Requires PHP >= 8.2.

```shell
composer require interworks/thoughtspotrest
```

Next, add the following required environment variables to your .env file:

```env
THOUGHTSPOT_REST_URL="https://YOUR-ORG.thoughtspot.cloud"
THOUGHTSPOT_REST_USERNAME="YOUR_USER"
```

Then, depending on your desired authentication, add these:

"Basic" authentication:

```env
THOUGHTSPOT_REST_AUTH_TYPE="basic"
THOUGHTSPOT_REST_PASSWORD="YOUR_USER_PASSWORD"
```

"Trusted" authentication:

```env
THOUGHTSPOT_REST_AUTH_TYPE="trusted"
THOUGHTSPOT_REST_SECRET_KEY="123abc-..."
```

"Cookie" authentication:

```env
THOUGHTSPOT_REST_AUTH_TYPE="cookie"
THOUGHTSPOT_REST_PASSWORD="YOUR_USER_PASSWORD"
```

For more information on ThoughtSpot REST API authentication options, view their doc [here](https://developers.thoughtspot.com/docs/api-authv2).

### Documentation

Every REST API call in ThoughtSpot's documentation has a function to call it with the same name in camel case. For instance, the "Search Metadata" API call can be called with:

```php
$ts->searchMetadata($args);
```

ThoughtSpot's REST API documentation can be found [here](https://developers.thoughtspot.com/docs/restV2-playground?apiResourceId=http/getting-started/introduction).

## Usage Guide

### Basic Usage

Instantiate a ThoughtSpotREST object and start making calls!

```php
use InterWorks\ThoughtSpotREST\ThoughtSpotREST;

// Instantiate
$ts = new ThoughtSpotREST();

// Get first 10 Liveboards and create a collection.
$liveboards = $ts->searchMetadata(['metadata' => ['type' => 'LIVEBOARD'], 'record_size' => 10]);
$liveboards = collect($liveboards);

// Get a user by name and update it
$users  = $ts->searchUsers(['user_identifier' => 'jlyons', 'record_size' => 1]);
$user   = collect($users)->first();
$userID = $user['id'];
$ts->updateUser($userID, ['email' => 'justin.lyons@interworks.com']);
```

### Unsupported Endpoints

If there's an endpoint missed, you can use the `call` function to specify the URL, arguments, and method. The function returns a `Illuminate\Http\Client\Response` object.

```php
$response = $ts->call(
    url   : 'metadata/search',
    args  : ['metadata' => ['type' => 'LIVEBOARD'], 'record_size' => 10],
    method: 'POST'
);
$response->json();
```

### Function Return Type Options

By default, either an array or boolean will be returned depending on the endpoint. If you'd like more control over how the response is processed, you can set `returnResponseObject` to `true` in the constructor to always receive the `Illuminate\Http\Client\Response` object.

```php
$ts         = new ThoughtSpotREST(returnResponseObject: true);
$response   = $ts->searchMetadata(['metadata' => ['type' => 'LIVEBOARD'], 'record_size' => 10]);
$success    = $response->successful();
$body       = $response->body();
$liveboards = $response->json();
```

## License

This package is released under the MIT License. See [`LICENSE`](LICENSE) for details.
