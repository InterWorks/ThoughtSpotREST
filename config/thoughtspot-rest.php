<?php

return [

    /*
    |---------------------------------------------------------------------------
    | Authentication Type
    |---------------------------------------------------------------------------
    |
    | This value specifies the type of authentication to use when making REST
    | API calls to the ThoughtSpot cluster. If the value isn't set, the package
    | will default to using the "Basic" authentication method.
    |
    | Doc: https://developers.thoughtspot.com/docs/api-authv2
    |
    | Supported: "basic", "trusted", "cookie"
    |
    */

    'auth' => env('THOUGHTSPOT_REST_AUTH_TYPE', 'basic'),

    /*
    |---------------------------------------------------------------------------
    | ThoughtSpot User Password
    |---------------------------------------------------------------------------
    |
    | This value is the password used to authenticate with the ThoughtSpot REST.
    | This user should have sufficient permissions to use the intended API's.
    | It's usually easiest to use an Org admin user.
    |
    */

    'password' => env('THOUGHTSPOT_REST_PASSWORD'),

    /*
    |---------------------------------------------------------------------------
    | ThoughtSpot Secret Key
    |---------------------------------------------------------------------------
    |
    | This value is the secret key used to authenticate with the ThoughtSpot. It
    | can be found in the ThoughtSpot web interface under the "DEVELOP" tab in
    | the "Security Settings" page.
    |
    */

    'secret_key' => env('THOUGHTSPOT_REST_SECRET_KEY'),

    /*
    |---------------------------------------------------------------------------
    | ThoughtSpot URL
    |---------------------------------------------------------------------------
    |
    | This value is used to specify the ThoughtSpot cluster to make REST API
    | calls against. This value should be the base URL of the cluster. Trailing
    | slashes will be ignored.
    |
    */

    'url' => env('THOUGHTSPOT_REST_URL'),

    /*
    |---------------------------------------------------------------------------
    | ThoughtSpot User Username
    |---------------------------------------------------------------------------
    |
    | This value is the username used to authenticate with the ThoughtSpot REST.
    | This user should have sufficient permissions to use the intended API's.
    | It's usually easiest to use an Org admin user.
    |
    */

    'username' => env('THOUGHTSPOT_REST_USERNAME'),

];
