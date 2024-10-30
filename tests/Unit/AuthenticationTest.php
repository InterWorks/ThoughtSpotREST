<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can get current user info', function () {
    // Create a mock for the class
    $expectedResponse = ['test' => 'test'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'auth/session/user',
        args            : [],
        method          : 'GET'
    );

    // Call the getCurrentUserInfo method
    $response = $mock->getCurrentUserInfo();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can get current user token', function () {
    // Create a mock for the class
    $expectedResponse = ['token' => 'abc123'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'auth/session/token',
        args            : [],
        method          : 'GET'
    );

    // Call the getCurrentUserToken method
    $response = $mock->getCurrentUserToken();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can get full access token', function () {
    // Create a mock for the class
    $expectedResponse = ['token' => 'fullAccessToken'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'auth/token/full',
        args            : [],
        method          : 'POST'
    );

    // Call the getFullAccessToken method
    $response = $mock->getFullAccessToken();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can get object access token', function () {
    // Create a mock for the class
    $expectedResponse = ['token' => 'objectAccessToken'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'auth/token/object',
        args            : [],
        method          : 'POST'
    );

    // Call the getObjectAccessToken method
    $response = $mock->getObjectAccessToken();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can login', function () {
    // Create a mock for the class
    $expectedResponse = 'loginSuccess';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'auth/session/login',
        args            : ['username' => 'test', 'password' => 'test'],
        method          : 'POST'
    );

    // Call the login method
    $response = $mock->login(['username' => 'test', 'password' => 'test']);

    // Assert the response
    expect($response)->toBe('clientId=value');

    // Clean up Mockery expectations
    Mockery::close();
});

test('can logout', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'auth/session/logout',
        args            : [],
        method          : 'POST'
    );

    // Call the logout method
    $response = $mock->logout();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can revoke token', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'auth/token/revoke',
        args            : [],
        method          : 'POST'
    );

    // Call the revokeToken method
    $response = $mock->revokeToken();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can validate token', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'auth/token/validate',
        args            : [],
        method          : 'POST'
    );

    // Call the validateToken method
    $response = $mock->validateToken();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
