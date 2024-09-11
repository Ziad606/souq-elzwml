<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products_skus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('size_attribute_id')->constrained('product_attributes')->onDelete('cascade');
            $table->foreignId('color_attribute_id')->constrained('product_attributes')->onDelete('cascade');
            $table->string('sku');
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products_skus');
    }
};
