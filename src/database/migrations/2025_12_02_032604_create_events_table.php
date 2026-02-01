<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type', 30)->comment('プロギング, 自然観察会, 農業体験, その他');
            $table->text('description')->nullable();
            $table->string('place')->nullable();
            $table->dateTime('scheduled_at')->nullable();
            $table->unsignedInteger('capacity')->nullable();
            $table->text('application_path');
            $table->string('status', 20)->default('published');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }}
