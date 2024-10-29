<?php

use Mockery;
use InterWorks\ThoughtSpotREST\ThoughtSpotREST;

test('constructor initializes correctly with valid configuration', function () {
    // Mock the ThoughtSpotREST class, specifically to check if _authenticate is called
    $mock = Mockery::mock(ThoughtSpotREST::class)->makePartial()->shouldAllowMockingMethod('_authenticate');

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
