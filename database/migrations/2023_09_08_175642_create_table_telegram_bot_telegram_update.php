<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName = 'bot_telegram_update';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary();
            $table->bigInteger('chat_id')->nullable()->default(null);
            $table->bigInteger('message_id')->unsigned()->default(null)->index();
            $table->bigInteger('edited_message_id')->unsigned()->default(null)->index();
            $table->bigInteger('channel_post_id')->unsigned()->default(null)->index();
            $table->bigInteger('edited_channel_post_id')->unsigned()->default(null)->index();
            $table->bigInteger('inline_query_id')->unsigned()->default(null)->index();
            $table->bigInteger('chosen_inline_result_id')->unsigned()->default(null)->index();
            $table->bigInteger('callback_query_id')->unsigned()->default(null)->index();
            $table->bigInteger('shipping_query_id')->unsigned()->default(null)->index();
            $table->bigInteger('pre_checkout_query_id')->unsigned()->default(null)->index();
            $table->bigInteger('poll_id')->unsigned()->default(null)->index();
            $table->bigInteger('poll_answer_poll_id')->unsigned()->default(null)->index();
            $table->bigInteger('my_chat_member_updated_id')->unsigned()->nullable()->index();
            $table->bigInteger('chat_member_updated_id')->unsigned()->nullable()->index();
            $table->bigInteger('chat_join_request_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index(['chat_id', 'message_id'], 'chat_message_id');

            $table->foreign(['chat_id', 'message_id'])->references(['chat_id', 'id'])->on('bot_message');
            $table->foreign(['edited_message_id'])->references(['id'])->on('bot_edited_message');
            $table->foreign(['chat_id', 'channel_post_id'])->references(['chat_id', 'id'])->on('bot_message');
            $table->foreign(['edited_channel_post_id'])->references(['id'])->on('bot_edited_message');
            $table->foreign(['inline_query_id'])->references(['id'])->on('bot_inline_query');
            $table->foreign(['chosen_inline_result_id'])->references(['id'])->on('bot_chosen_inline_result');
            $table->foreign(['callback_query_id'])->references(['id'])->on('bot_callback_query');
            $table->foreign(['shipping_query_id'])->references(['id'])->on('bot_shipping_query');
            $table->foreign(['pre_checkout_query_id'])->references(['id'])->on('bot_pre_checkout_query');
            $table->foreign(['poll_id'])->references(['id'])->on('bot_poll');
            $table->foreign(['poll_answer_poll_id'])->references(['poll_id'])->on('bot_poll_answer');
            $table->foreign(['my_chat_member_updated_id'])->references(['id'])->on('bot_chat_member_updated');
            $table->foreign(['chat_member_updated_id'])->references(['id'])->on('bot_chat_member_updated');
            $table->foreign(['chat_join_request_id'])->references(['id'])->on('bot_chat_join_request');
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
