<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('obl_name');
            $table->string('region_name')->nullable();
            $table->string('city_name')->nullable();
            $table->string('city_region_name')->nullable();
            $table->string('street_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
