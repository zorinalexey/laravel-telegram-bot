<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName = 'bot_poll_answer';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigInteger('poll_id')->unsigned()->unique();
            $table->bigInteger('user_id')->index();
            $table->text('option_ids');
            $table->softDeletes();
            $table->timestamps();

            $table->primary(['poll_id', 'user_id']);

            $table->foreign('poll_id')->references('id')->on('bot_poll');
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
