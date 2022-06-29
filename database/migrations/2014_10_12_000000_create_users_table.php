<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('profile_picture');
        //     $table->string('institute');
        //     $table->string('email')->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->integer('role');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });

        // Schema::create('blogs', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title');
        //     $table->string('content');
        //     $table->string('category');
        //     $table->integer('author');
        //     $table->string('author_alt_name');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }
};
