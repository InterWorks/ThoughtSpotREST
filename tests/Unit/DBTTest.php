<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can create DBT connection', function () {
    // Create a mock for the class
    $expectedResponse = ['connection' => 'created'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'dbt/dbt-connection',
        args            : [],
        method          : 'POST'
    );

    // Call the createDBTConnection method
    $response = $mock->createDBTConnection();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can delete DBT connection', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $connectionIdentifier = 'test-connection';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : "dbt/$connectionIdentifier/delete",
        args            : [],
        method          : 'POST'
    );

    // Call the deleteDBTConnection method
    $response = $mock->deleteDBTConnection($connectionIdentifier);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can generate DBT sync TML', function () {
    // Create a mock for the class
    $expectedResponse = ['tml' => 'sync'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'dbt/generate-sync-tml',
        args            : [],
        method          : 'POST'
    );

    // Call the generateDBTSyncTML method
    $response = $mock->generateDBTSyncTML();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can generate DBT TML', function () {
    // Create a mock for the class
    $expectedResponse = ['tml' => 'generated'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'dbt/generate-tml',
        args            : [],
        method          : 'POST'
    );

    // Call the generateDBTTML method
    $response = $mock->generateDBTTML();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can search DBT connections', function () {
    // Create a mock for the class
    $expectedResponse = ['connections' => ['conn1', 'conn2']];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'dbt/search',
        args            : [],
        method          : 'POST'
    );

    // Call the searchDBTConnections method
    $response = $mock->searchDBTConnections();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can update DBT connection', function () {
    // Create a mock for the class
    $expectedResponse = ['connection' => 'updated'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'dbt/update-dbt-connection',
        args            : [],
        method          : 'POST'
    );

    // Call the updateDBTConnection method
    $response = $mock->updateDBTConnection();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
