<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('puppies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('breed')->nullable();
            $table->string('gender')->nullable();
            $table->string('color')->nullable();
            $table->string('age')->nullable();
            $table->string('coat')->nullable();
            $table->string('status')->default('available');
            $table->decimal('price', 10, 2)->default(0);
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->json('gallery')->nullable();
            $table->boolean('is_new')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('puppies');
    }
};
