<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can assign change author', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'security/metadata/assign',
        args            : [],
        method          : 'POST'
    );

    // Call the assignChangeAuthor method
    $response = $mock->assignChangeAuthor();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can fetch permissions of principals', function () {
    // Create a mock for the class
    $expectedResponse = ['permissions' => ['perm1', 'perm2']];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'security/principals/fetch-permissions',
        args            : [],
        method          : 'POST'
    );

    // Call the fetchPermissionsOfPrincipals method
    $response = $mock->fetchPermissionsOfPrincipals();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can fetch permissions on metadata', function () {
    // Create a mock for the class
    $expectedResponse = ['permissions' => ['perm1', 'perm2']];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'security/metadata/fetch-permissions',
        args            : [],
        method          : 'POST'
    );

    // Call the fetchPermissionsOnMetadata method
    $response = $mock->fetchPermissionsOnMetadata();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can share metadata', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'security/metadata/share',
        args            : [],
        method          : 'POST'
    );

    // Call the shareMetadata method
    $response = $mock->shareMetadata();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
