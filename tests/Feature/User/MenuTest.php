<?php

namespace Tests\Feature\User;

use App\Models\Category;
use App\Models\Item;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MenuTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;
    protected Category $category;

    public function setUp(): void
    {
        parent::setUp();
        $this->user     = $this->createUser();
        $this->category = Category::factory()->create();
    }

    public function test_api_user_can_create_menu(): void
    {
        $item       = $this->createItem();
        $menu       = [
            'user_id'       => $this->user->id,
            'qty'           => 3,
            'item_id'       => $item->id,
            'unit_price'    => $item->price,
            'discount'      => 0,
            'grand_total'   => $item->price * 3
        ];
        $response  = $this->actingAs($this->user)
            ->postJson('/api/v1/menus', $menu)
            ->assertSuccessful();
    }

    public function test_an_menu_belong_to_a_user()
    {
        $menu = $this->createMenu();
        $this->assertInstanceOf(User::class, $menu->user);
    }
}
