<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName = 'bot_chat_join_request';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
            $table->bigInteger('chat_id');
            $table->bigInteger('user_id');
            $table->timestamp('date');
            $table->text('bio')->nullable();
            $table->text('invite_link')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('chat_id')->references('id')->on('bot_chat');
            $table->foreign('user_id')->references('id')->on('bot_user');
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
