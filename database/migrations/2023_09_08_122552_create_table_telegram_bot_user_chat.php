<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName = 'bot_user_chat';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->bigInteger('chat_id');
            $table->softDeletes();
            $table->timestamps();

            $table->primary(['user_id', 'chat_id']);

            $table->foreign('user_id')->references('id')->on('bot_user')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('chat_id')->references('id')->on('bot_chat')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
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
