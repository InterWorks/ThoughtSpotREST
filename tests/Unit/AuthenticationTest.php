<?php

use Mockery;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use InterWorks\ThoughtSpotREST\ThoughtSpotREST;

test('getCurrentUserInfo returns Response when returnResponseObject is true', function () {
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to true in the constructor
    $mock->__construct(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = Http::response(['data' => 'test'], 200);

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
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to false in the constructor
    $mock->__construct(returnResponseObject: false);

    // Fake a response to return JSON data
    $fakeResponse = Http::response(['data' => 'test'], 200);

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
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to true in the constructor
    $mock->__construct(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = Http::response(['token' => 'fake_token'], 200);

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
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to false in the constructor
    $mock->__construct(returnResponseObject: false);

    // Fake a response to return JSON data
    $fakeResponse = Http::response(['token' => 'fake_token'], 200);

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
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to true in the constructor
    $mock->__construct(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = Http::response(['token' => 'full_access_token'], 200);

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
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to false in the constructor
    $mock->__construct(returnResponseObject: false);

    // Fake a response to return JSON data
    $fakeResponse = Http::response(['token' => 'full_access_token'], 200);

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
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to true in the constructor
    $mock->__construct(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = Http::response(['token' => 'object_access_token'], 200);

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
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to false in the constructor
    $mock->__construct(returnResponseObject: false);

    // Fake a response to return JSON data
    $fakeResponse = Http::response(['token' => 'object_access_token'], 200);

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

test('getObjectAccessToken returns Response when returnResponseObject is true', function () {
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to true in the constructor
    $mock->__construct(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = Http::response(['token' => 'object_access_token'], 200);

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
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to false in the constructor
    $mock->__construct(returnResponseObject: false);

    // Fake a response to return JSON data
    $fakeResponse = Http::response(['token' => 'object_access_token'], 200);

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
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to true in the constructor
    $mock->__construct(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = Http::response([], 200); // assuming empty response as cookies are not part of JSON

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
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to false in the constructor
    $mock->__construct(returnResponseObject: false);

    // Fake a response with a mock for cookies
    $fakeResponse = Http::response([], 200); // Assume empty JSON as cookies are set separately
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
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to true in the constructor
    $mock->__construct(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = Http::response([], 200); // Simulate a successful response

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
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to false in the constructor
    $mock->__construct(returnResponseObject: false);

    // Fake a response to simulate a successful response
    $fakeResponse = Http::response([], 200); // 200 indicates success
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
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to true in the constructor
    $mock->__construct(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = Http::response([], 200); // Simulate a successful response

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
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to false in the constructor
    $mock->__construct(returnResponseObject: false);

    // Fake a response to simulate a successful response
    $fakeResponse = Http::response([], 200); // 200 indicates success
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
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to true in the constructor
    $mock->__construct(returnResponseObject: true);

    // Fake a response to be returned by the `call` method
    $fakeResponse = Http::response([], 200); // Simulate a successful response

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
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Set returnResponseObject to false in the constructor
    $mock->__construct(returnResponseObject: false);

    // Fake a response to simulate a successful response
    $fakeResponse = Http::response([], 200); // 200 indicates success
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
