<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can create connection', function () {
    // Create a mock for the class
    $expectedResponse = ['connection' => 'created'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'connection/create',
        args            : ['name' => 'testConnection'],
        method          : 'POST'
    );

    // Call the createConnection method
    $response = $mock->createConnection(['name' => 'testConnection']);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can delete connection', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'connection/delete',
        args            : ['id' => 'testConnectionId'],
        method          : 'POST'
    );

    // Call the deleteConnection method
    $response = $mock->deleteConnection(['id' => 'testConnectionId']);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can download connection metadata changes', function () {
    // Create a mock for the class
    $expectedResponse = 'metadataChanges';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'connections/download-connection-metadata-changes/testConnectionId',
        method          : 'POST'
    );

    // Call the downloadConnectionMetadataChanges method
    $response = $mock->downloadConnectionMetadataChanges('testConnectionId');

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can fetch connection diff status', function () {
    // Create a mock for the class
    $expectedResponse = ['status' => 'diffStatus'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'connections/fetch-connection-diff-status/testConnectionId',
        method          : 'POST'
    );

    // Call the fetchConnectionDiffStatus method
    $response = $mock->fetchConnectionDiffStatus('testConnectionId');

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can search connection', function () {
    // Create a mock for the class
    $expectedResponse = ['connections' => ['connection1', 'connection2']];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'connection/search',
        args            : ['query' => 'testQuery'],
        method          : 'POST'
    );

    // Call the searchConnection method
    $response = $mock->searchConnection(['query' => 'testQuery']);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can update connection', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'connection/update',
        args            : ['id' => 'testConnectionId', 'name' => 'updatedName'],
        method          : 'POST'
    );

    // Call the updateConnection method
    $response = $mock->updateConnection(['id' => 'testConnectionId', 'name' => 'updatedName']);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
