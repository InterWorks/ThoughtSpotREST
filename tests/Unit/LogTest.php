<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can fetch logs', function () {
    // Create a mock for the class
    $expectedResponse = ['logs' => ['log1', 'log2']];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'logs/fetch',
        args            : [],
        method          : 'POST'
    );

    // Call the fetchLogs method
    $response = $mock->fetchLogs();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
