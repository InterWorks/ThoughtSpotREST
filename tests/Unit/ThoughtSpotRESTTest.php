<?php

test('can be initialized', function () {
    $ts = new \Interworks\ThoughtSpot\ThoughtSpot();
    expect($ts)->toBeInstanceOf(\Interworks\ThoughtSpot\ThoughtSpot::class);
});
