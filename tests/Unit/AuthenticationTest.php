<?php

use Mockery;

test('can get current user info', function () {
    // Create a mock for the class that uses the Authentication trait
    $mock = Mockery::mock(Authentication::class)->makePartial();

    // Define the expected response
    $expectedResponse = ['user' => 'testUser'];

    // Mock the call method to return the expected response
    $mock->shouldReceive('call')
        ->with('auth/session/user', 'GET')
        ->andReturn(new class ($expectedResponse) {
            private $response;
            public function __construct($response)
            {
                $this->response = $response;
            }
            public function json()
            {
                return $this->response;
            }
        });

    // Call the getCurrentUserInfo method
    $response = $mock->getCurrentUserInfo();

    // Assert the response
    expect($response)->toBe($expectedResponse);
});
