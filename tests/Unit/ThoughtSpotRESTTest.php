<?php

use Mockery;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use InterWorks\ThoughtSpotREST\ThoughtSpotREST;

test('constructor initializes correctly with valid configuration', function () {
    // Mock the ThoughtSpotREST class, specifically to check if _authenticate is called
    $mock = Mockery::mock(ThoughtSpotREST::class)->makePartial()->shouldAllowMockingProtectedMethods();

    // Ensure the _authenticate method is called in the constructor
    $mock->shouldReceive('_authenticate')
        ->once()
        ->andReturnNull();

    // Instantiate the class to trigger the constructor
    $mock->__construct();

    // Validate that properties were set correctly
    expect($mock->getAuthType())->toBe('basic');
    expect($mock->getPassword())->toBe('password');
    expect($mock->getSecretKey())->toBe(null);
    expect($mock->getUsername())->toBe('username');
    expect($mock->getReturnResponseObject())->toBeFalse(); // default set in constructor

    // Clean up Mockery expectations
    Mockery::close();
});

test('constructor throws exception with invalid configuration', function () {
    // Set invalid auth type to trigger exception
    Config::set('thoughtspotrest.auth', 'invalid_auth_type');

    // Expect an exception when initializing the class
    $this->expectException(Exception::class);
    $this->expectExceptionMessage('The ThoughtSpot auth type is not valid');

    // Instantiate ThoughtSpotREST to trigger exception
    new ThoughtSpotREST();
});

test('constructing with returnResponseObject set to true returns Illuminate\Http\Client\Response', function () {
    // Mock the ThoughtSpotREST class with partial methods
    $mock = Mockery::mock(ThoughtSpotREST::class)
        ->makePartial()
        ->shouldAllowMockingProtectedMethods();

    // Ensure the _authenticate method is called in the constructor
    $mock->shouldReceive('_authenticate')
        ->once()
        ->andReturnNull();

    // Set returnResponseObject to true in the constructor
    $mock->__construct(returnResponseObject: true);

    // Fake a response to be used in the `call` method
    $fakeResponse = Http::response(['data' => 'test'], 200);

    // Mock the `call` method to return a Response instance
    $mock->shouldReceive('call')
         ->andReturn($fakeResponse);

    // Call an API method that uses the `call` method internally
    $result = $mock->getCurrentUserInfo();

    // Assert that the result is an instance of Illuminate\Http\Client\Response
    expect($result)->toBeInstanceOf(Response::class);

    // Clean up Mockery expectations
    Mockery::close();
});
