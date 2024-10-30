<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can assign tag', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'tags/assign',
        args            : [],
        method          : 'POST'
    );

    // Call the assignTag method
    $response = $mock->assignTag();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can create tag', function () {
    // Create a mock for the class
    $expectedResponse = ['tag' => 'created'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'tags/create',
        args            : [],
        method          : 'POST'
    );

    // Call the createTag method
    $response = $mock->createTag();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can delete tag', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $tagIdentifier = 'test-tag';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : "tags/$tagIdentifier/delete",
        args            : [],
        method          : 'POST'
    );

    // Call the deleteTag method
    $response = $mock->deleteTag($tagIdentifier);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can search tags', function () {
    // Create a mock for the class
    $expectedResponse = ['tags' => ['tag1', 'tag2']];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'tags/search',
        args            : [],
        method          : 'POST'
    );

    // Call the searchTags method
    $response = $mock->searchTags();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can unassign tag', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'tags/unassign',
        args            : [],
        method          : 'POST'
    );

    // Call the unassignTag method
    $response = $mock->unassignTag();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can update tag', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $tagIdentifier = 'test-tag';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : "tags/$tagIdentifier/update",
        args            : [],
        method          : 'POST'
    );

    // Call the updateTag method
    $response = $mock->updateTag($tagIdentifier);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
