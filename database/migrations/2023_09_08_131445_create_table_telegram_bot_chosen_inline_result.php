<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName = 'bot_chosen_inline_result';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigInteger('id')->unique()->autoIncrement()->unsigned();
            $table->string('result_id', 255)->default('');
            $table->bigInteger('user_id')->nullable()->default(null)->index();
            $table->bigInteger('inline_message_id')->nullable()->default(null);
            $table->text('query');
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
