<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private string $tableName = 'bot_message';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->bigInteger('chat_id');
            $table->bigInteger('sender_chat_id');
            $table->bigInteger('user_id')->nullable()->index();
            $table->timestamp('date')->nullable()->default(null);
            $table->bigInteger('forward_from')->index()->nullable()->default(null);
            $table->bigInteger('forward_from_chat')->nullable()->default(null)->index();
            $table->bigInteger('forward_from_message_id')->nullable()->default(null);
            $table->text('forward_signature')->nullable()->default(null);
            $table->text('forward_sender_name')->nullable()->default(null);
            $table->timestamp('forward_date')->nullable()->default(null);
            $table->bigInteger('reply_to_chat')->nullable()->default(null)->index();
            $table->bigInteger('reply_to_message')->unsigned()->nullable()->default(null)->index();
            $table->bigInteger('via_bot')->nullable()->default(null)->index();
            $table->timestamp('edit_date')->nullable()->default(null);
            $table->text('media_group_id');
            $table->text('author_signature');
            $table->text('text');
            $table->text('entities');
            $table->text('caption_entities');
            $table->text('audio');
            $table->text('document');
            $table->text('animation');
            $table->text('game');
            $table->text('photo');
            $table->text('sticker');
            $table->text('video');
            $table->text('voice');
            $table->text('video_note');
            $table->text('caption');
            $table->text('contact');
            $table->text('location');
            $table->text('venue');
            $table->text('poll');
            $table->text('dice');
            $table->text('new_chat_members');
            $table->bigInteger('left_chat_member')->nullable()->default(null)->index();
            $table->string('new_chat_title', 255)->default(null);
            $table->text('new_chat_photo');
            $table->boolean('delete_chat_photo')->default(false);
            $table->boolean('group_chat_created')->default(false);
            $table->boolean('supergroup_chat_created')->default(false);
            $table->boolean('channel_chat_created')->default(false);
            $table->text('message_auto_delete_timer_changed');
            $table->bigInteger('migrate_to_chat_id')->nullable()->default(null)->index();
            $table->bigInteger('migrate_from_chat_id')->nullable()->default(null)->index();
            $table->text('pinned_message')->nullable();
            $table->text('invoice')->nullable();
            $table->text('successful_payment')->nullable();
            $table->text('connected_website')->nullable();
            $table->text('passport_data')->nullable();
            $table->text('proximity_alert_triggered')->nullable();
            $table->text('video_chat_scheduled')->nullable();
            $table->text('video_chat_started')->nullable();
            $table->text('video_chat_ended')->nullable();
            $table->text('video_chat_participants_invited')->nullable();
            $table->text('reply_markup')->nullable();
            $table->boolean('is_automatic_forward')->default(false);
            $table->boolean('has_protected_content')->default(false);
            $table->text('web_app_data')->nullable()->default(null);
            $table->boolean('is_topic_message')->default(false);
            $table->boolean('has_media_spoiler')->default(false);
            $table->bigInteger('message_thread_id')->nullable()->default(null);
            $table->text('forum_topic_created')->nullable()->default(null);
            $table->text('forum_topic_closed')->nullable()->default(null);
            $table->text('forum_topic_reopened')->nullable()->default(null);
            $table->text('write_access_allowed')->nullable()->default(null);
            $table->text('forum_topic_edited')->nullable()->default(null);
            $table->text('general_forum_topic_hidden')->nullable()->default(null);
            $table->text('general_forum_topic_unhidden')->nullable()->default(null);
            $table->text('user_shared')->nullable()->default(null);
            $table->text('chat_shared')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();

            $table->primary(['chat_id', 'id']);

            $table->foreign('user_id')->references('id')->on('bot_user');
            $table->foreign('chat_id')->references('id')->on('bot_chat');
            $table->foreign('forward_from')->references('id')->on('bot_user');
            $table->foreign('forward_from_chat')->references('id')->on('bot_chat');
            $table->foreign(['reply_to_chat', 'reply_to_message'])->references(['chat_id', 'id'])->on('bot_message');
            $table->foreign('via_bot')->references('id')->on('bot_user');
            $table->foreign('left_chat_member')->references('id')->on('bot_user');
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
