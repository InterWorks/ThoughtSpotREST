<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can export answer report', function () {
    // Create a mock for the class
    $expectedResponse = 'report content';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'report/answer',
        args            : [],
        method          : 'POST'
    );

    // Call the exportAnswerReport method
    $response = $mock->exportAnswerReport();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can export liveboard report', function () {
    // Create a mock for the class
    $expectedResponse = 'report content';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'report/liveboard',
        args            : [],
        method          : 'POST'
    );

    // Call the exportLiveboardReport method
    $response = $mock->exportLiveboardReport();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
