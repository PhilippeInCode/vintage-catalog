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
        Schema::create('garments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('origin_country')->nullable();
            $table->integer('production_year')->nullable();
            $table->string('production_period')->nullable();
            $table->enum('usage_type', ['military','formal','work','sport']);
            $table->integer('usage_year')->nullable();
            $table->string('used_country')->nullable();
            $table->text('materials')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garments');
    }
};
