<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_likes_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('activity_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['user_id', 'activity_id']); // 1ユーザー1いいね
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};

