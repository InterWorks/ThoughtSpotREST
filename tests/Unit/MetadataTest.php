<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can delete metadata', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'metadata/delete',
        args            : [],
        method          : 'DELETE'
    );

    // Call the deleteMetadata method
    $response = $mock->deleteMetadata();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can export metadata TML', function () {
    // Create a mock for the class
    $expectedResponse = ['tml' => 'exported'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'metadata/tml/export',
        args            : [],
        method          : 'POST'
    );

    // Call the exportMetadataTML method
    $response = $mock->exportMetadataTML();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can export metadata TML batched', function () {
    // Create a mock for the class
    $expectedResponse = ['tml' => 'exported in batches'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'metadata/tml/export/batch',
        args            : [],
        method          : 'POST'
    );

    // Call the exportMetadataTMLBatched method
    $response = $mock->exportMetadataTMLBatched();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can fetch answer SQL query', function () {
    // Create a mock for the class
    $expectedResponse = ['sql' => 'query'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'metadata/answer/sql',
        args            : [],
        method          : 'POST'
    );

    // Call the fetchAnswerSQLQuery method
    $response = $mock->fetchAnswerSQLQuery();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can fetch liveboard SQL query', function () {
    // Create a mock for the class
    $expectedResponse = ['sql' => 'query'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'metadata/liveboard/sql',
        args            : [],
        method          : 'POST'
    );

    // Call the fetchLiveboardSQLQuery method
    $response = $mock->fetchLiveboardSQLQuery();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can import metadata TML', function () {
    // Create a mock for the class
    $expectedResponse = ['tml' => 'imported'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'metadata/tml/import',
        args            : [],
        method          : 'POST'
    );

    // Call the importMetadataTML method
    $response = $mock->importMetadataTML();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can search metadata', function () {
    // Create a mock for the class
    $expectedResponse = ['metadata' => ['item1', 'item2']];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'metadata/search',
        args            : [],
        method          : 'POST'
    );

    // Call the searchMetadata method
    $response = $mock->searchMetadata();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
