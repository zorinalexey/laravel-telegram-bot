<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName = 'bot_chat';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigInteger('id')->unique()->primary();
            $table->enum('type', ['private', 'group', 'supergroup', 'channel']);
            $table->string('username', 255)->default(null);
            $table->string('first_name', 255)->default(null);
            $table->string('last_name', 255)->default(null);
            $table->boolean('all_members_are_administrators',)->default(false);
            $table->string('old_id', 50)->default(null)->index();
            $table->boolean('is_forum')->default(false);
            $table->softDeletes();
            $table->timestamps();
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
