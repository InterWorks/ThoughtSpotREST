<?php

use Mockery;
use InterWorks\ThoughtSpotREST\ThoughtSpotREST;

test('can be initialized', function () {
    // Set up mock
    $mock = Mockery::mock(ThoughtSpotREST::class)->makePartial();
    $mock->shouldReceive('call')
        ->withArgs(['auth/token/full', ['username' => 'username', 'password' => 'password'], 'POST'])
        ->andReturn(['token' => 'fake_token']);

    $ts = new ThoughtSpotREST();
    expect($ts)->toBeInstanceOf(ThoughtSpotREST::class);
});
