<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can activate user', function () {
    // Create a mock for the class
    $expectedResponse = ['user' => 'activated'];
    $args = ['user' => 'test-user'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'users/activate',
        args            : $args,
        method          : 'POST'
    );

    // Call the activateUser method
    $response = $mock->activateUser($args);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can change user password', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $args = ['password' => 'new-password'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'users/change-password',
        args            : $args,
        method          : 'POST'
    );

    // Call the changeUserPassword method
    $response = $mock->changeUserPassword($args);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can create user', function () {
    // Create a mock for the class
    $expectedResponse = ['user' => 'created'];
    $args = ['user' => 'creating'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'users/create',
        args            : $args,
        method          : 'POST'
    );

    // Call the createUser method
    $response = $mock->createUser($args);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can deactivate user', function () {
    // Create a mock for the class
    $expectedResponse = ['user' => 'deactivated'];
    $args = ['user' => 'test-user'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'users/deactivate',
        args            : $args,
        method          : 'POST'
    );

    // Call the deactivateUser method
    $response = $mock->deactivateUser($args);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can delete user', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $userIdentifier = 'test-user';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : "users/$userIdentifier/delete",
        args            : [],
        method          : 'POST'
    );

    // Call the deleteUser method
    $response = $mock->deleteUser($userIdentifier);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can force logout users', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'users/force-logout',
        args            : [],
        method          : 'POST'
    );

    // Call the forceLogoutUsers method
    $response = $mock->forceLogoutUsers();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can import users', function () {
    // Create a mock for the class
    $expectedResponse = ['users' => 'imported'];
    $args = ['users' => 'importing'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'users/import',
        args            : $args,
        method          : 'POST'
    );

    // Call the importUsers method
    $response = $mock->importUsers($args);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can reset user password', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $args = ['user' => 'test-user'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'users/reset-password',
        args            : $args,
        method          : 'POST'
    );

    // Call the resetUserPassword method
    $response = $mock->resetUserPassword($args);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can search users', function () {
    // Create a mock for the class
    $expectedResponse = ['users' => ['user1', 'user2']];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'users/search',
        args            : [],
        method          : 'POST'
    );

    // Call the searchUsers method
    $response = $mock->searchUsers();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can update user', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $userIdentifier = 'test-user';
    $args = ['user' => 'updated'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : "users/$userIdentifier/update",
        args            : $args,
        method          : 'POST'
    );

    // Call the updateUser method
    $response = $mock->updateUser($userIdentifier, $args);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
