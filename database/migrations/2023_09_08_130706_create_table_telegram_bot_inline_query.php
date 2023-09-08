<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName = 'bot_inline_query';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigInteger('id')->unique()->primary()->unsigned();
            $table->bigInteger('user_id')->nullable()->index();
            $table->string('location', 255)->nullable()->default(null);
            $table->text('query');
            $table->string('offset', 255)->nullable()->default(null);
            $table->string('chat_type', 255)->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();

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
