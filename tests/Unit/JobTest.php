<?php

use App\Models\Employer;
use App\Models\Job;

test('It belongs to an employer', function () {
    // Arrange
    $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        'employer_id' => $employer->id,
    ]);
    // Act and assert
    expect($job->employer->is($employer))->toBeTrue();
    
});

test('It can have tags', function () {
    // Arrange
    $job = Job::factory()->create();
    // Act
    $job->tag('Frontend');
    // Assert
    expect($job->tags)->toHaveCount(1);
});
