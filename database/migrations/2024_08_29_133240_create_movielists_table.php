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
        Schema::create('movielists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('director');
            $table->string('hero');
            $table->string('herione')->nullable();
            $table->string('music_director')->nullable();
            $table->integer('rating')->nullable();
            $table->string('story')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movielists');
    }
};
