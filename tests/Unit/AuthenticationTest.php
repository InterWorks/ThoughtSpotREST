<?php

use Mockery;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use InterWorks\ThoughtSpotREST\ThoughtSpotREST;

function createThoughtSpotMock(bool $returnResponseObject = false)
{
    // Create and configure the mock
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Ensure the _authenticate method is mocked
    $mock->shouldReceive('_authenticate')
        ->once()
        ->andReturnNull();

    // Set returnResponseObject as needed
    $mock->__construct(returnResponseObject: $returnResponseObject);

    return $mock;
}

test('getCurrentUserInfo returns Response when returnResponseObject is true', function () {
    $mock = createThoughtSpotMock(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = new Response(Http::response(['data' => 'test'], 200)->toPsrResponse());

    // Mock the `call` method to return the fake response
    $mock->shouldReceive('call')
         ->with('auth/session/user', [], 'GET')
         ->andReturn($fakeResponse);

    // Call getCurrentUserInfo and assert it returns a Response instance
    $result = $mock->getCurrentUserInfo();
    expect($result)->toBeInstanceOf(Response::class);

    // Clean up Mockery expectations
    Mockery::close();
});

test('getCurrentUserInfo returns array when returnResponseObject is false', function () {
    $mock = createThoughtSpotMock(returnResponseObject: false);

    // Fake a response to return JSON data
    $fakeResponse = new Response(Http::response(['data' => 'test'], 200)->toPsrResponse());

    // Mock the `call` method to return the fake response
    $mock->shouldReceive('call')
         ->with('auth/session/user', [], 'GET')
         ->andReturn($fakeResponse);

    // Call getCurrentUserInfo and assert it returns an array
    $result = $mock->getCurrentUserInfo();
    expect($result)->toBe(['data' => 'test']);

    // Clean up Mockery expectations
    Mockery::close();
});

test('getCurrentUserToken returns Response when returnResponseObject is true', function () {
    $mock = createThoughtSpotMock(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = new Response(Http::response(['token' => 'fake_token'], 200)->toPsrResponse());

    // Mock the `call` method to return the fake response
    $mock->shouldReceive('call')
         ->with('auth/session/token', [], 'GET')
         ->andReturn($fakeResponse);

    // Call getCurrentUserToken and assert it returns a Response instance
    $result = $mock->getCurrentUserToken();
    expect($result)->toBeInstanceOf(Response::class);

    // Clean up Mockery expectations
    Mockery::close();
});

test('getCurrentUserToken returns array when returnResponseObject is false', function () {
    $mock = createThoughtSpotMock(returnResponseObject: false);

    // Fake a response to return JSON data
    $fakeResponse = new Response(Http::response(['token' => 'fake_token'], 200)->toPsrResponse());

    // Mock the `call` method to return the fake response
    $mock->shouldReceive('call')
         ->with('auth/session/token', [], 'GET')
         ->andReturn($fakeResponse);

    // Call getCurrentUserToken and assert it returns an array
    $result = $mock->getCurrentUserToken();
    expect($result)->toBe(['token' => 'fake_token']);

    // Clean up Mockery expectations
    Mockery::close();
});

test('getFullAccessToken returns Response when returnResponseObject is true', function () {
    $mock = createThoughtSpotMock(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = new Response(Http::response(['token' => 'full_access_token'], 200)->toPsrResponse());

    // Mock the `call` method to return the fake response
    $mock->shouldReceive('call')
         ->with('auth/token/full', ['username' => 'testuser', 'password' => 'testpass'], 'POST')
         ->andReturn($fakeResponse);

    // Call getFullAccessToken and assert it returns a Response instance
    $result = $mock->getFullAccessToken(['username' => 'testuser', 'password' => 'testpass']);
    expect($result)->toBeInstanceOf(Response::class);

    // Clean up Mockery expectations
    Mockery::close();
});

test('getFullAccessToken returns array when returnResponseObject is false', function () {
    $mock = createThoughtSpotMock(returnResponseObject: false);

    // Fake a response to return JSON data
    $fakeResponse = new Response(Http::response(['token' => 'full_access_token'], 200)->toPsrResponse());

    // Mock the `call` method to return the fake response
    $mock->shouldReceive('call')
         ->with('auth/token/full', ['username' => 'testuser', 'password' => 'testpass'], 'POST')
         ->andReturn($fakeResponse);

    // Call getFullAccessToken and assert it returns an array
    $result = $mock->getFullAccessToken(['username' => 'testuser', 'password' => 'testpass']);
    expect($result)->toBe(['token' => 'full_access_token']);

    // Clean up Mockery expectations
    Mockery::close();
});


test('getObjectAccessToken returns Response when returnResponseObject is true', function () {
    $mock = createThoughtSpotMock(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = new Response(Http::response(['token' => 'object_access_token'], 200)->toPsrResponse());

    // Mock the `call` method to return the fake response
    $mock->shouldReceive('call')
         ->with('auth/token/object', ['object_id' => '12345'], 'POST')
         ->andReturn($fakeResponse);

    // Call getObjectAccessToken and assert it returns a Response instance
    $result = $mock->getObjectAccessToken(['object_id' => '12345']);
    expect($result)->toBeInstanceOf(Response::class);

    // Clean up Mockery expectations
    Mockery::close();
});

test('getObjectAccessToken returns array when returnResponseObject is false', function () {
    $mock = createThoughtSpotMock(returnResponseObject: false);

    // Fake a response to return JSON data
    $fakeResponse = new Response(Http::response(['token' => 'object_access_token'], 200)->toPsrResponse());

    // Mock the `call` method to return the fake response
    $mock->shouldReceive('call')
         ->with('auth/token/object', ['object_id' => '12345'], 'POST')
         ->andReturn($fakeResponse);

    // Call getObjectAccessToken and assert it returns an array
    $result = $mock->getObjectAccessToken(['object_id' => '12345']);
    expect($result)->toBe(['token' => 'object_access_token']);

    // Clean up Mockery expectations
    Mockery::close();
});

test('login returns Response when returnResponseObject is true', function () {
    $mock = createThoughtSpotMock(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = new Response(Http::response([], 200)->toPsrResponse());

    // Mock the `call` method to return the fake response
    $mock->shouldReceive('call')
         ->with('auth/session/login', ['username' => 'testuser', 'password' => 'testpass'], 'POST')
         ->andReturn($fakeResponse);

    // Call login and assert it returns a Response instance
    $result = $mock->login(['username' => 'testuser', 'password' => 'testpass']);
    expect($result)->toBeInstanceOf(Response::class);

    // Clean up Mockery expectations
    Mockery::close();
});

test('login returns processed cookies as string when returnResponseObject is false', function () {
    $mock = createThoughtSpotMock(returnResponseObject: false);

    // Fake a response with a mock for cookies
    $fakeResponse = new Response(Http::response([], 200)->toPsrResponse());
    $fakeResponse->cookies = ['session_cookie=test_cookie_data']; // Simulated cookies array

    // Mock the `call` method to return the fake response
    $mock->shouldReceive('call')
         ->with('auth/session/login', ['username' => 'testuser', 'password' => 'testpass'], 'POST')
         ->andReturn($fakeResponse);

    // Mock the `processCookies` method to return the expected cookie string
    $mock->shouldReceive('processCookies')
         ->with($fakeResponse->cookies)
         ->andReturn('session_cookie=test_cookie_data');

    // Call login and assert it returns the processed cookies string
    $result = $mock->login(['username' => 'testuser', 'password' => 'testpass']);
    expect($result)->toBe('session_cookie=test_cookie_data');

    // Clean up Mockery expectations
    Mockery::close();
});

test('logout returns Response when returnResponseObject is true', function () {
    $mock = createThoughtSpotMock(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = new Response(Http::response([], 200)->toPsrResponse());

    // Mock the `call` method to return the fake response
    $mock->shouldReceive('call')
         ->with('auth/session/logout', [], 'POST')
         ->andReturn($fakeResponse);

    // Call logout and assert it returns a Response instance
    $result = $mock->logout();
    expect($result)->toBeInstanceOf(Response::class);

    // Clean up Mockery expectations
    Mockery::close();
});

test('logout returns boolean when returnResponseObject is false', function () {
    $mock = createThoughtSpotMock(returnResponseObject: false);

    // Fake a response to simulate a successful response
    $fakeResponse = new Response(Http::response([], 200)->toPsrResponse());
    $fakeResponse->successful = fn() => true; // Mocking successful() method

    // Mock the `call` method to return the fake response
    $mock->shouldReceive('call')
         ->with('auth/session/logout', [], 'POST')
         ->andReturn($fakeResponse);

    // Call logout and assert it returns a boolean true for success
    $result = $mock->logout();
    expect($result)->toBeTrue();

    // Clean up Mockery expectations
    Mockery::close();
});

test('revokeToken returns Response when returnResponseObject is true', function () {
    $mock = createThoughtSpotMock(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = new Response(Http::response([], 200)->toPsrResponse());

    // Mock the `call` method to return the fake response
    $mock->shouldReceive('call')
         ->with('auth/token/revoke', ['token' => 'fake_token'], 'POST')
         ->andReturn($fakeResponse);

    // Call revokeToken and assert it returns a Response instance
    $result = $mock->revokeToken(['token' => 'fake_token']);
    expect($result)->toBeInstanceOf(Response::class);

    // Clean up Mockery expectations
    Mockery::close();
});

test('revokeToken returns boolean when returnResponseObject is false', function () {
    $mock = createThoughtSpotMock(returnResponseObject: false);

    // Fake a response to simulate a successful response
    $fakeResponse = new Response(Http::response([], 200)->toPsrResponse());
    $fakeResponse->successful = fn() => true; // Mocking successful() method

    // Mock the `call` method to return the fake response
    $mock->shouldReceive('call')
         ->with('auth/token/revoke', ['token' => 'fake_token'], 'POST')
         ->andReturn($fakeResponse);

    // Call revokeToken and assert it returns a boolean true for success
    $result = $mock->revokeToken(['token' => 'fake_token']);
    expect($result)->toBeTrue();

    // Clean up Mockery expectations
    Mockery::close();
});

test('validateToken returns Response when returnResponseObject is true', function () {
    $mock = createThoughtSpotMock(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = new Response(Http::response([], 200)->toPsrResponse());

    // Mock the `call` method to return the fake response
    $mock->shouldReceive('call')
         ->with('auth/token/validate', ['token' => 'fake_token'], 'POST')
         ->andReturn($fakeResponse);

    // Call validateToken and assert it returns a Response instance
    $result = $mock->validateToken(['token' => 'fake_token']);
    expect($result)->toBeInstanceOf(Response::class);

    // Clean up Mockery expectations
    Mockery::close();
});

test('validateToken returns boolean when returnResponseObject is false', function () {
    $mock = createThoughtSpotMock(returnResponseObject: false);

    // Fake a response to simulate a successful response
    $fakeResponse = new Response(Http::response([], 200)->toPsrResponse());
    $fakeResponse->successful = fn() => true; // Mocking successful() method

    // Mock the `call` method to return the fake response
    $mock->shouldReceive('call')
         ->with('auth/token/validate', ['token' => 'fake_token'], 'POST')
         ->andReturn($fakeResponse);

    // Call validateToken and assert it returns a boolean true for success
    $result = $mock->validateToken(['token' => 'fake_token']);
    expect($result)->toBeTrue();

    // Clean up Mockery expectations
    Mockery::close();
});
