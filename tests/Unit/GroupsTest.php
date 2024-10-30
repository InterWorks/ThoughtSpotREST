<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can create user group', function () {
    // Create a mock for the class
    $expectedResponse = ['group' => 'created'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'groups/create',
        args            : [],
        method          : 'POST'
    );

    // Call the createUserGroup method
    $response = $mock->createUserGroup();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can delete user group', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $groupIdentifier = 'test-group';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : "groups/$groupIdentifier/delete",
        args            : [],
        method          : 'POST'
    );

    // Call the deleteUserGroup method
    $response = $mock->deleteUserGroup($groupIdentifier);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can import user groups', function () {
    // Create a mock for the class
    $expectedResponse = ['groups' => 'imported'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'groups/import',
        args            : [],
        method          : 'POST'
    );

    // Call the importUserGroups method
    $response = $mock->importUserGroups();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can search user groups', function () {
    // Create a mock for the class
    $expectedResponse = ['groups' => ['group1', 'group2']];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'groups/search',
        args            : [],
        method          : 'POST'
    );

    // Call the searchUserGroups method
    $response = $mock->searchUserGroups();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can update user group', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $groupIdentifier = 'test-group';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : "groups/$groupIdentifier/update",
        args            : [],
        method          : 'POST'
    );

    // Call the updateUserGroup method
    $response = $mock->updateUserGroup($groupIdentifier);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
