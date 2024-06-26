<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todo', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement();
            $table->timestamps();
            $table->boolean('done')->nullable(false)->default(false);
            $table->string('name')->nullable(false);
            $table->string('comment')->nullable(true);
            $table->foreignId('user_id')->references('id')->on('users');
            $table->index('done', 'todo_done_idx');
            $table->index('created_at', 'todo_created_at_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo');
    }
};
