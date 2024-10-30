<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can get system config', function () {
    // Create a mock for the class
    $expectedResponse = ['config' => 'system config'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'system/config',
        args            : [],
        method          : 'GET'
    );

    // Call the getSystemConfig method
    $response = $mock->getSystemConfig();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can get system information', function () {
    // Create a mock for the class
    $expectedResponse = ['info' => 'system information'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'system',
        args            : [],
        method          : 'GET'
    );

    // Call the getSystemInformation method
    $response = $mock->getSystemInformation();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can get system override info', function () {
    // Create a mock for the class
    $expectedResponse = ['overrides' => 'system override info'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'system/config-overrides',
        args            : [],
        method          : 'GET'
    );

    // Call the getSystemOverrideInfo method
    $response = $mock->getSystemOverrideInfo();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can update system config', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $args = ['config' => 'new config'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'system/config-update',
        args            : $args,
        method          : 'POST'
    );

    // Call the updateSystemConfig method
    $response = $mock->updateSystemConfig($args);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
