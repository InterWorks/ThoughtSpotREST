<?php

use InterWorks\ThoughtSpotREST\ThoughtSpotREST;

test('can be initialized', function () {
    $ts = new ThoughtSpotREST();
    expect($ts)->toBeInstanceOf(ThoughtSpotREST::class);
});
