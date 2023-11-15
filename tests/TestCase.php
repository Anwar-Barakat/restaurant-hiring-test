<?php

namespace Tests;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function createUser(): User
    {
        return User::factory()->create();
    }

    protected function createAdmin(): Admin
    {
        return Admin::factory()->create();
    }
}