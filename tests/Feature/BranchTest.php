<?php

use App\Models\Branch;

it('can create a branch', function () {
    $branch = Branch::factory()->create();

    expect($branch->name)->not->toBeEmpty();
    expect($branch->city)->not->toBeEmpty();
    expect($branch->country)->not->toBeEmpty();
    expect($branch->manager_id)->not->toBeEmpty();
    expect($branch->status)->toBeTrue();
});

it('can get the manager of the branch', function () {
    $branch = Branch::factory()->create();

    expect($branch->manager)->not->toBeNull();
});

it('can get the branch of the user', function () {
    $branch = Branch::factory()->create();
    $user = $branch->manager;

    expect($user->branch)->not->toBeNull();
    expect($user->branch->name)->toBe($branch->name);
    expect($user->branch->city)->toBe($branch->city);
    expect($user->branch->country)->toBe($branch->country);
    expect($user->branch->manager_id)->toBe($branch->manager_id);
    expect($user->branch->status)->toBe($branch->status);
});

