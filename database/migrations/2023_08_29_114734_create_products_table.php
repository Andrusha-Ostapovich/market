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
            $table->unsignedBigInteger('seller_id');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->decimal('old_price', 10, 2)->nullable();
            $table->string('article');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('attribute_value_id')->nullable();
            $table->string('brand');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('attribute_value_id')->references('id')->on('attribute_values');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
