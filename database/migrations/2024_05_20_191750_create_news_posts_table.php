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
        Schema::create('news_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->string('title');
            $table->string('title_slug');
            $table->string('image');
            $table->text('details');
            $table->string('tags')->nullable();
            $table->boolean('breaking_news')->default(0);
            $table->boolean('top_slider')->default(0);
            $table->boolean('section_three')->default(0);
            $table->boolean('section_nine')->default(0);
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_posts');
    }
};
