<?php

use Mockery;
use InterWorks\ThoughtSpotREST\Tests\Mocks\ThoughtSpotRESTMock;

test('can commit branch', function () {
    // Create a mock for the class
    $expectedResponse = ['commit' => 'success'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'vcs/git/branches/commit',
        args            : [],
        method          : 'POST'
    );

    // Call the commitBranch method
    $response = $mock->commitBranch();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can create config', function () {
    // Create a mock for the class
    $expectedResponse = ['config' => 'created'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'vcs/git/config/create',
        args            : [],
        method          : 'POST'
    );

    // Call the createConfig method
    $response = $mock->createConfig();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can delete config', function () {
    // Create a mock for the class
    $expectedResponse = true;
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'vcs/git/config/delete',
        args            : [],
        method          : 'POST'
    );

    // Call the deleteConfig method
    $response = $mock->deleteConfig();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can deploy commit', function () {
    // Create a mock for the class
    $expectedResponse = ['deploy' => 'success'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'vcs/git/commits/deploy',
        args            : [],
        method          : 'POST'
    );

    // Call the deployCommit method
    $response = $mock->deployCommit();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can revert commit', function () {
    // Create a mock for the class
    $expectedResponse = ['revert' => 'success'];
    $commitID = 'test-commit';
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : "vcs/git/commits/$commitID/revert",
        args            : [],
        method          : 'POST'
    );

    // Call the revertCommit method
    $response = $mock->revertCommit($commitID);

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can search commits', function () {
    // Create a mock for the class
    $expectedResponse = ['commits' => ['commit1', 'commit2']];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'vcs/git/commits/search',
        args            : [],
        method          : 'POST'
    );

    // Call the searchCommits method
    $response = $mock->searchCommits();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can search config', function () {
    // Create a mock for the class
    $expectedResponse = ['configs' => ['config1', 'config2']];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'vcs/git/config/search',
        args            : [],
        method          : 'POST'
    );

    // Call the searchConfig method
    $response = $mock->searchConfig();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can update config', function () {
    // Create a mock for the class
    $expectedResponse = ['config' => 'updated'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'vcs/git/config/update',
        args            : [],
        method          : 'POST'
    );

    // Call the updateConfig method
    $response = $mock->updateConfig();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});

test('can validate merge', function () {
    // Create a mock for the class
    $expectedResponse = ['validation' => 'success'];
    $mock = ThoughtSpotRESTMock::mockWithCall(
        expectedResponse: $expectedResponse,
        url             : 'vcs/git/branches/validate',
        args            : [],
        method          : 'POST'
    );

    // Call the validateMerge method
    $response = $mock->validateMerge();

    // Assert the response
    expect($response)->toBe($expectedResponse);

    // Clean up Mockery expectations
    Mockery::close();
});
