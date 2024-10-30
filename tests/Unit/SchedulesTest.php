<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can create schedule', function () {
    // Create a mock for the class
    $expectedResponse = ['schedule' => 'created'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'schedules/create',
        args            : [],
        method          : 'POST'
    );

    // Call the createSchedule method
    $response = $mock->createSchedule();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can delete schedule', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $scheduleIdentifier = 'test-schedule';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : "schedules/$scheduleIdentifier/delete",
        args            : [],
        method          : 'POST'
    );

    // Call the deleteSchedule method
    $response = $mock->deleteSchedule($scheduleIdentifier);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can search schedules', function () {
    // Create a mock for the class
    $expectedResponse = ['schedules' => ['schedule1', 'schedule2']];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'schedules/search',
        args            : [],
        method          : 'POST'
    );

    // Call the searchSchedules method
    $response = $mock->searchSchedules();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can update schedule', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $scheduleIdentifier = 'test-schedule';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : "schedules/$scheduleIdentifier/update",
        args            : [],
        method          : 'POST'
    );

    // Call the updateSchedule method
    $response = $mock->updateSchedule($scheduleIdentifier);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
