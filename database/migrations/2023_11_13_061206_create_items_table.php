<?php

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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnUpdate();
            $table->string('name')->unique();
            $table->float('price', 10, 2);
            $table->double('discount', 8, 2)->comment('Percentage Discount')->default(0);
            $table->float('gst', 10, 2)->default(0);
            $table->longText('description');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_best_seller')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
