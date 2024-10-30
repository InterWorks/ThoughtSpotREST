<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can create custom action', function () {
    // Create a mock for the class
    $expectedResponse = ['action' => 'created'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'customization/custom-actions',
        args            : ['name' => 'testAction'],
        method          : 'POST'
    );

    // Call the createCustomAction method
    $response = $mock->createCustomAction(['name' => 'testAction']);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can delete custom action', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'customization/custom-actions/testActionId/delete',
        method          : 'POST'
    );

    // Call the deleteCustomAction method
    $response = $mock->deleteCustomAction('testActionId');

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can search custom actions', function () {
    // Create a mock for the class
    $expectedResponse = ['actions' => ['action1', 'action2']];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'customization/custom-actions/search',
        args            : ['query' => 'testQuery'],
        method          : 'POST'
    );

    // Call the searchCustomActions method
    $response = $mock->searchCustomActions(['query' => 'testQuery']);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can update custom action', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'customization/custom-actions/testActionId/update',
        args            : ['name' => 'updatedAction'],
        method          : 'POST'
    );

    // Call the updateCustomAction method
    $response = $mock->updateCustomAction('testActionId', ['name' => 'updatedAction']);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
