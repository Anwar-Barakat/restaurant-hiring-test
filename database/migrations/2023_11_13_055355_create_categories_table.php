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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->string('name');
            $table->string('url')->unique();
            $table->double('discount', 8, 2)->comment('Percentage Discount')->default(0);
            $table->longText('description');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
