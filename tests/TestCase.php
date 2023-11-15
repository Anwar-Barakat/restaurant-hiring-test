<?php

namespace Tests;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Item;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

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

    public function actingAs($user, $driver = null)
    {
        $token = JWTAuth::fromUser($user);
        $this->withHeader('Authorization', "Bearer {$token}");
        parent::actingAs($user);

        return $this;
    }

    protected function createCategory(): Category
    {
        return Category::factory()->create();
    }

    public function createItem(): Item
    {
        $this->createCategory();
        return Item::factory()->create();
    }

    public function createMenu(): Menu
    {
        $this->createUser();
        $this->createItem();
        return  Menu::factory()->create();
    }
}
