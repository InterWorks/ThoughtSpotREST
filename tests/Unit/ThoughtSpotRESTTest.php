<?php

use Mockery;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use InterWorks\ThoughtSpotREST\ThoughtSpotREST;

test('constructor initializes correctly with valid configuration', function () {
    // Mock the ThoughtSpotREST class
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

test('can authenticate', function () {
    // Mock the ThoughtSpotREST class
    $mock = Mockery::mock(ThoughtSpotREST::class)->makePartial()->shouldAllowMockingProtectedMethods();

    // Create a mock for the Illuminate\Http\Client\Response class
    $expectedResponse = ['token' => 'testToken'];
    $responseMock     = Mockery::mock(Response::class);
    $responseMock->shouldReceive('json')->andReturn($expectedResponse);

    // Mock the call method to return the response mock
    $url    = 'auth/token/full';
    $args   = [
        'username' => 'username',
        'password' => 'password',
    ];
    $method = 'POST';
    $mock->shouldReceive('call')
        ->with($url, $args, $method)
        ->andReturn($responseMock);

    // Instantiate the class to trigger the constructor
    $mock->__construct();

    // Validate the token was set to the mocked value
    expect($mock->getToken())->toBe('testToken');

    // Clean up Mockery expectations
    Mockery::close();
});
