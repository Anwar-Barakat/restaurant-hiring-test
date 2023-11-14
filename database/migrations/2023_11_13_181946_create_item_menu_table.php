<?php

use App\Models\Item;
use App\Models\Menu;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_menu', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Menu::class)->index();
            $table->foreignIdFor(Item::class)->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_menu');
    }
};