<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName = 'bot_callback_query';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary();
            $table->bigInteger('user_id')->nullable()->index();
            $table->bigInteger('chat_id')->nullable()->index();
            $table->bigInteger('message_id')->nullable()->unsigned()->index();
            $table->string('inline_message_id', 255)->nullable()->default(null);
            $table->string('chat_instance', 255)->default('');
            $table->string('data', 255)->default('');
            $table->string('game_short_name', 255)->default('');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('bot_user');
            $table->foreign(['chat_id', 'message_id'])->references(['chat_id', 'id'])->on('bot_message');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->tableName);
    }
};
