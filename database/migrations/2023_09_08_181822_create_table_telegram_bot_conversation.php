<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName = 'bot_conversation';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
            $table->bigInteger('user_id')->nullable()->default(null)->index();
            $table->bigInteger('chat_id')->nullable()->default(null)->index();
            $table->enum('status', ['active', 'cancelled', 'stopped',])->default('active')->index();
            $table->string('command', 160)->default('');
            $table->text('notes')->default(null);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('bot_user');
            $table->foreign('chat_id')->references('id')->on('bot_chat');
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
