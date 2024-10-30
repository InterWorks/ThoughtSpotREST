<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can fetch answer data', function () {
    // Create a mock for the class
    $expectedResponse = ['data' => 'sample'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'metadata/answer/data',
        args            : [],
        method          : 'POST'
    );

    // Call the fetchAnswerData method
    $response = $mock->fetchAnswerData();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can fetch liveboard data', function () {
    // Create a mock for the class
    $expectedResponse = ['data' => 'sample'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'metadata/liveboard/data',
        args            : [],
        method          : 'POST'
    );

    // Call the fetchLiveboardData method
    $response = $mock->fetchLiveboardData();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can search data', function () {
    // Create a mock for the class
    $expectedResponse = ['data' => 'sample'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'searchdata',
        args            : ['query' => 'testQuery'],
        method          : 'POST'
    );

    // Call the searchData method
    $response = $mock->searchData(['query' => 'testQuery']);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
