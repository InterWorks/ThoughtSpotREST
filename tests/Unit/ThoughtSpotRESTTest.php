<?php

use Interworks\ThoughtSpot\ThoughtSpotREST;

test('can be initialized', function () {
    $ts = new ThoughtSpotREST();
    expect($ts)->toBeInstanceOf(ThoughtSpotREST::class);
});
