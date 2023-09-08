<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName = 'bot_edited_message';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
            $table->bigInteger('chat_id')->index();
            $table->bigInteger('message_id')->unsigned()->index();
            $table->bigInteger('user_id')->nullable()->index();
            $table->timestamp('edit_date')->nullable()->default(null);
            $table->text('text');
            $table->text('entities');
            $table->text('caption');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('chat_id')->references('id')->on('bot_chat');
            $table->foreign(['chat_id', 'message_id'])->references(['chat_id', 'id'])->on('bot_message');
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
