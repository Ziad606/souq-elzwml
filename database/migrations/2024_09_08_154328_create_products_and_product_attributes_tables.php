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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('summary')->nullable();
            $table->string('cover')->nullable();
            $table->foreignId('category_id')->constrained('sub_categories')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['color', 'size']);
            $table->string('value');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attributes');
        Schema::dropIfExists('products');
    }
};
