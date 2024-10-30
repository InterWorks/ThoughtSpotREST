<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can create org', function () {
    // Create a mock for the class
    $expectedResponse = ['org' => 'created'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'orgs/create',
        args            : [],
        method          : 'POST'
    );

    // Call the createOrg method
    $response = $mock->createOrg();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can delete org', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $orgIdentifier = 'test-org';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : "orgs/$orgIdentifier/delete",
        args            : [],
        method          : 'POST'
    );

    // Call the deleteOrg method
    $response = $mock->deleteOrg($orgIdentifier);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can search orgs', function () {
    // Create a mock for the class
    $expectedResponse = ['orgs' => ['org1', 'org2']];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'orgs/search',
        args            : [],
        method          : 'POST'
    );

    // Call the searchOrgs method
    $response = $mock->searchOrgs();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can update org', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $orgIdentifier = 'test-org';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : "orgs/$orgIdentifier/update",
        args            : [],
        method          : 'POST'
    );

    // Call the updateOrg method
    $response = $mock->updateOrg($orgIdentifier);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
