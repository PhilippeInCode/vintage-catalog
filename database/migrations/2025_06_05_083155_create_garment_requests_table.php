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
        Schema::create('garment_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('usage_type');
            $table->text('description')->nullable();
            $table->string('origin_country')->nullable();
            $table->string('used_country')->nullable();
            $table->integer('production_year')->nullable();
            $table->integer('usage_year')->nullable();
            $table->string('production_period')->nullable();
            $table->string('materials')->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garment_requests');
    }
};
