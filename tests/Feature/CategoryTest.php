<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Admin $admin;
    private Category $category;

    public function setUp(): void
    {
        parent::setUp();
        $this->user     = $this->createUser();
        $this->admin    = $this->createAdmin();
        $this->category = Category::factory()->create();
    }

    public function test_api_return_categories_list()
    {
        // action
        $response = $this->actingAs($this->admin)
            ->getJson('/api/v1/categories');

        // assertion
        $response->assertStatus(200);
        $this->assertEquals(1, count($response->json()['data']));
    }

    public function test_api_fetch_single_category()
    {
        $response = $this->actingAs($this->admin)
            ->getJson('/api/v1/categories/' . $this->category->id)
            ->assertOk()
            ->json();
        $this->assertEquals($this->category->name, $response['data']['name']);
    }


    public function test_api_store_new_category()
    {
        $category = [
            'parent_id'         => 0,
            'name'              => 'Appetizers',
            'url'               => 'appetizers',
            'discount'          => 3,
            'description'       => 'Appetizers description',
            'meta_title'        => 'food, appetizers, restaurant',
            'meta_description'  => 'food, appetizers, restaurant, description, before the main mail',
            'meta_keywords'     => 'before main mail, food, drink, breads',
            'is_active'         => 1,
        ];

        $response = $this->actingAs($this->admin)
            ->postJson('/api/v1/categories', $category)
            ->assertSuccessful();

        $this->assertDatabaseHas('categories', ['name' => 'Appetizers']);
        $this->assertEquals('Appetizers', $response['data']['name']);
    }

    public function test_api_category_invalid_store_returns_error()
    {
        $category = ['name'  => ''];
        $response = $this->postJson('/api/v1/categories', $category)
            ->assertUnprocessable();
        $response->assertJsonValidationErrors(['name']);
    }
}
