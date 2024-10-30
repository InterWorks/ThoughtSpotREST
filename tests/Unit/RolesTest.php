<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can create role', function () {
    // Create a mock for the class
    $expectedResponse = ['role' => 'created'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'roles/create',
        args            : [],
        method          : 'POST'
    );

    // Call the createRole method
    $response = $mock->createRole();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can delete role', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $roleIdentifier = 'test-role';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : "roles/$roleIdentifier/delete",
        args            : [],
        method          : 'POST'
    );

    // Call the deleteRole method
    $response = $mock->deleteRole($roleIdentifier);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can search roles', function () {
    // Create a mock for the class
    $expectedResponse = ['roles' => ['role1', 'role2']];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'roles/search',
        args            : [],
        method          : 'POST'
    );

    // Call the searchRoles method
    $response = $mock->searchRoles();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can update role', function () {
    // Create a mock for the class
    $expectedResponse = ['role' => 'updated'];
    $roleIdentifier = 'test-role';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : "roles/$roleIdentifier/update",
        args            : [],
        method          : 'POST'
    );

    // Call the updateRole method
    $response = $mock->updateRole($roleIdentifier);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
