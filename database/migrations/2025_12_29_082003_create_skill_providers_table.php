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
        Schema::create('skill_providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('skill_title');
            $table->string('location')->nullable();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('image_url')->nullable();
            $table->boolean('verified')->default(false);
            $table->float('rating')->default(0);
            $table->integer('total_reviews')->default(0);
            $table->text('bio')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_providers');
    }
};
