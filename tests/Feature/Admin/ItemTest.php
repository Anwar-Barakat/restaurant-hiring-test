<?php

namespace Tests\Feature\Admin;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    private Admin $admin;
    private Item $item;
    private Category $category;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin        = $this->createAdmin();
        $this->category     = Category::factory()->create();
        $this->item         = Item::factory()->create();
    }
    public function test_api_fetch__all_items_data(): void
    {
        $this->category;
        $response   = $this->actingAs($this->admin)
            ->getJson('/api/v1/admin/items')
            ->assertOk();
        $this->assertEquals(1, count($response->json()['data']));
    }

    public function test_api_fetch_a_single_item()
    {
        $response = $this->actingAs($this->admin)
            ->getJson('/api/v1/admin/items/' . $this->item->id)
            ->assertOk()
            ->json();

        $this->assertEquals($this->item->name, $response['data']['name']);
    }

    public function test_api_store_new_item()
    {
        $item = [
            'category_id'       => $this->category->id,
            'name'              => 'Roasted chicken',
            'price'             => 10,
            'gst'               => 0,
            'discount'          => 1,
            'description'       => 'a delicious lunch meal',
            'meta_title'        => 'Roasted chicken',
            'meta_description'  => 'food, restaurant, roasted chicken, chicken',
            'meta_keywords'     => 'food, restaurant, lunch, meal, chicken',
            'is_featured'       => 1,
            'is_best_seller'    => 1,
            'is_active'         => 1,
        ];

        $response = $this->actingAs($this->admin)
            ->postJson('/api/v1/admin/items', $item)
            ->assertSuccessful();

        $this->assertDatabaseHas('items', ['name' => 'Roasted chicken']);
        $this->assertEquals('Roasted chicken', $response['data']['name']);
    }

    public function test_api_item_invalid_store_returns_error()
    {
        $item = ['name'  => ''];
        $response = $this->postJson('/api/v1/admin/items', $item)
            ->assertUnprocessable();
        $response->assertJsonValidationErrors(['name']);
    }
}
