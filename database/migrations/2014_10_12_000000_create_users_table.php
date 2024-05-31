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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            // Admin Settings
            $table->boolean('dark_mode')->default(0)->nullable();
            $table->boolean('top_bar_dark')->default(0)->nullable();
            $table->boolean('boxed_layout')->default(0)->nullable();
            $table->boolean('sidebar_user_info')->default(0)->nullable();
            $table->enum('left_sidebar_color', ['light','dark','brand','gradient'])->default('light');
            $table->enum('left_sidebar_size', ['default','compact','condensed'])->default('default');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
